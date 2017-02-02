<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PerfilArtista;
use App\PayuFactura;
use App\Inscripcion;
use App\TecnicaObra;
use App\TemaObra;
use App\Artista;
use App\Parametro;
use App\Obra;
use App\Pais;
use Validator;
use Storage;
use Mail;
use URL;
use DB;

class InscripcionController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index(Request $request)
{   
    $inscripciones = $this->listInscripciones($request);

    $inscripciones = $inscripciones->paginate(50);
    return view('inscripciones', ['inscripciones' => $inscripciones, 'request' => $request]);

}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    $pais = Pais::orderBy('pais','ASC')->get();
    $tecnicaObra = TecnicaObra::all();
    $temaObra = TemaObra::orderBy('tema','ASC')->get();
    $perfilArtista = PerfilArtista::orderBy('perfil','ASC')->get();
    return view('registro', ['pais' => $pais,
        'tecnicaObra' => $tecnicaObra,
        'temaObra' => $temaObra,
        'perfilArtista' => $perfilArtista]);
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $validator = $this->validator($request->all());

    if ($validator->fails()){
        return redirect()->action('InscripcionController@create')->withErrors($validator)
            ->withInput();
    }else{

        $cv = $request->file('cv');
        $cvRoute = time().'_'.$cv->getClientOriginalName();
        Storage::disk('cv')->put($cvRoute, file_get_contents( $cv->getRealPath() ));

        $artista = Artista::create(['nombre' => $request->nombre
            ,'apellido' => $request->apellido
            ,'pais_id' => $request->pais
            ,'lugar_nacimiento' => $request->Lnacimiento
            ,'fecha_nacimiento' => $request->Fnacimiento
            ,'direccion_domicilio' => $request->direccionD
            ,'direccion_postal' => $request->direccion
            ,'email' => $request->email
            ,'telefono_fijo' => $request->telFijo
            ,'telefono_movil' => $request->telMovil
            ,'perfil_artista_id' => $request->perfil
            ,'ruta_hoja_vida' => $cvRoute
        ]);

        $venta = str_replace('.','',$request->venta);
        if($request->file('sintesisArchivo')) {
            $sintesisArchivo = $request->file('sintesisArchivo');
            $sintesisArchivoRoute = time().'_'.$sintesisArchivo->getClientOriginalName();
            Storage::disk('sintesisObra')->put($sintesisArchivoRoute, file_get_contents( $sintesisArchivo->getRealPath() ));    
        }else{
            $sintesisArchivoRoute = '';
        }
        $fotosobra = $request->fotosObra;
        //return $fotosobra[0];
        if($fotosobra[0] != '') {
            $arrayFotos = '';
            $fotosObra = $request->file('fotosObra');
            foreach ($fotosObra as $foto) {
                $fotosObraRoute = time().'_'.$foto->getClientOriginalName();
                Storage::disk('fotos')->put($fotosObraRoute, file_get_contents( $foto->getRealPath() ));
                $arrayFotos = $fotosObraRoute."|".$arrayFotos;
            }
        }else{
            $arrayFotos = '';
        }

        $obra = Obra::create(['titulo' => $request->titulo
            ,'sintesis_conceptual' => $request->sintesis
            ,'sintesis_archivo' => $sintesisArchivoRoute
            ,'ruta_fotos_obra' => $arrayFotos
            ,'tipo_obra' => $request->tipoObra
            ,'alto_medida' => $request->alto
            ,'ancho_medida' => $request->ancho
            ,'peso' => $request->peso
            ,'tema' => $request->tema
            ,'tecnica' => $request->tecnica
            ,'valor_venta' => $venta
        ]);
    }

    $inscripcion = Inscripcion::create(['artista_id' => $artista->id, 'obra_id' => $obra->id]);

    return redirect::route('inscripcion.confirmacion', ['id' => $inscripcion->id]);

}
/**
 * Validacion formulario inscripción
 */
private function validator(array $array){

    $rules = ['nombre' => 'required|max:255'
        ,'apellido' => 'required|max:255'
        ,'pais' => 'required|numeric|not_in:0'
        ,'Lnacimiento' => 'required'
        ,'Fnacimiento' => 'required'
        ,'direccion' => 'max:255'
        ,'direccionD' => 'required|max:255'
        ,'email' => 'required|email|max:255'
        ,'telFijo' => 'numeric'
        ,'telMovil' => 'required|numeric'
        ,'perfil' => 'required|numeric|not_in:0'
        ,'cv' => 'required|mimes:doc,docx,pdf'
        ,'titulo' => 'required|max:255'
        ,'sintesis' => 'required_without:sintesisArchivo|max:500'
        ,'sintesisArchivo' => 'required_without:sintesis|mimes:doc,docx,pdf'
        ,'tema' => 'required|numeric|not_in:0'
        ,'tecnica' => 'required|numeric|not_in:0'
        ,'fotosObra' => 'array'
        ,'alto' => 'required|numeric'
        ,'tipoObra' => 'required|numeric|not_in:0'
        ,'venta' => 'required_if:ventaC,1'
        ,'ancho' => 'numeric|required_if:tipoObra,1'
        ,'peso' => 'numeric|required_if:tipoObra,2'
    ];

    return Validator::make($array, $rules);
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $inscripcion = DB::table('inscripcion as ins')
    ->join('artista as art','art.id','=','ins.artista_id')
    ->join('pais as pai','pai.id','=','art.pais_id')
    ->join('obra as obr','obr.id','=','ins.obra_id')
    ->join('tecnica_obra as teo','teo.id','=','obr.tecnica')
    ->join('tema_obra as tmo','tmo.id','=','obr.tema')
    ->join('perfil_artista as per','per.id','=','art.perfil_artista_id')
    ->select('ins.id as id_inscripcion',
        'ins.created_at as fecha_inscripcion',
        'ins.estado as estado',
        'ins.aceptado as aceptado',
        'art.nombre',
        'art.apellido',
        'art.lugar_nacimiento',
        'art.fecha_nacimiento',
        'art.direccion_domicilio',
        'art.direccion_postal',
        'art.email',
        'art.telefono_fijo',
        'art.telefono_movil',
        'art.ruta_hoja_vida',
        'per.perfil',
        'obr.titulo',
        'obr.sintesis_conceptual',
        'obr.sintesis_archivo',
        'obr.ruta_fotos_obra',
        'obr.tipo_obra',
        'obr.alto_medida',
        'obr.ancho_medida',
        'obr.peso',
        'tmo.tema',
        'teo.id as id_tecnica',
        'teo.tecnica',
        'obr.valor_venta',
        'pai.pais'
        )

    ->where('ins.id', '=', $id)
    ->first();
    $fotos = explode('|', $inscripcion->ruta_fotos_obra);
    return view('inscripcion', compact(['inscripcion', 'fotos']));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    //
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    //
}

public function showExcel(Request $request){

    $inscripciones = $this->listInscripciones($request);
    Excel::create('Laravel Excel', function($excel) use($inscripciones) {
        $excel->sheet('Inscripciones', function($sheet) use ($inscripciones) {
            $infoExcel = []; 
            $infoExcel[] = ['Id', 'Fecha inscripción', 'Nombres', 'Apellidos',
                            'Teléfono Movil', 'Correo', 'País', 'Perfil', 'Titulo Obra',
                            'Tema' ,'Técnica', 'Valor venta', 'Estado Transacción', 'Aceptado'];
            $inscripciones = $inscripciones->get();
            foreach($inscripciones as $inscripcion) 
            { 
                $infoExcel[] = $inscripcion->toArray();
            }
            $sheet->fromArray($infoExcel, null, 'A1', false, false);
        });
    })->export('xls');
}

/**
 * Página de respuesta payU
 *
 * @return \Illuminate\Http\Response
 *
 */
public function payUresponse(Request $request){
    $parametros = $this->traerParametro('apiKey');
    $ApiKey = $parametros['apiKey'];
    $merchant_id = $request->merchantId;
    $referenceCode = $request->referenceCode;
    $TX_VALUE = $request->TX_VALUE;
    $New_value = number_format($TX_VALUE, 1, '.', '');
    $currency = $request->currency;
    $transactionState = $request->transactionState;
    $firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
    $firmaCreada = md5($firma_cadena);
    $firma = $request->signature;

    if ($request->transactionState == 4 ) {
        $estadoTx = "Transacción aprobada";
    }
    else if ($request->transactionState == 6 ) {
        $estadoTx = "Transacción rechazada";
    }
    else if ($request->transactionState == 104 ) {
        $estadoTx = "Error";
    }
    else if ($request->transactionState == 7 ) {
        $estadoTx = "Transacción pendiente";
    }
    else {
        $estadoTx=$request->mensaje;
    }

    return view('respuestaPayU', ['infoRespuesta' => $request, 'estadoTx' => $estadoTx, 'firma' => $firma, 'firmaCreada' => $firmaCreada]);
}

/**
 * Operaciones de confirmación PayU
 *
 * @return \Illuminate\Http\Response
 *
 */
public function payUconfirmation(Request $request){
    $parametros = $this->traerParametro();
    $email = $request->email_buyer;
    $emailAdmin = $parametros['emailAdmin']; 
    $ApiKey = $parametros['apiKey'];
    $ultimo_valor = substr($request->value, -1);
    if ($ultimo_valor == '0'){
        $new_value = substr( $request->value , 0 , -1);
    }else{
        $new_value = $request->value;
    };
    
    $firma_cadena = "$ApiKey~$request->merchant_id~$request->reference_sale~$new_value~$request->currency~$request->state_pol";
    $firma_creada = md5($firma_cadena);
    $firma = $request->sign;
    //$referencia = explode(',',$request->reference_sale);

    if (strtoupper($firma) == strtoupper($firma_creada)) {

        //Se actualiza el estado de la inscripción
        Inscripcion::where('id','=',$request->reference_sale)
        ->update(['estado' => $request->state_pol]);

        //Se inserta los datos de PayU a la tabla como respaldo de la operación
        PayuFactura::create(['merchant_id' => $request->merchant_id,
                         'state_pol' => $request->state_pol, 
                         'response_code_pol' => $request->response_code_pol, 
                         'reference_sale' => $request->reference_sale,
                         'reference_pol' => $request->reference_pol, 
                         'payment_method_type' => $request->payment_method_type, 
                         'value' => $request->value, 
                         'tax' => $request->tax,
                         'transaction_date' => $request->transaction_date, 
                         'currency' => $request->currency, 
                         'email_buyer' => $request->email_buyer, 
                         'cus' => $request->cus,
                         'pse_bank' => $request->pse_bank, 
                         'description' => $request->description, 
                         'billing_address' => $request->billing_address, 
                         'shipping_address' => $request->shipping_address,
                         'phone' => $request->phone, 
                         'office_phone' => $request->office_phone, 
                         'account_number_ach' => $request->account_number_ach, 
                         'account_type_ach' => $request->account_type_ach,
                         'authorization_code' => $request->authorization_code, 
                         'bank_id' => $request->bank_id, 
                         'billing_city' => $request->billing_city, 
                         'billing_country' => $request->billing_country,
                         'customer_number' => $request->customer_number, 
                         'date' => $request->date, 
                         'error_code_bank' => $request->error_code_bank, 
                         'error_message_bank' => $request->error_message_bank,
                         'exchange_rate' => $request->exchange_rate, 
                         'ip' => $request->ip, 
                         'payment_method_id' => $request->payment_method_id, 
                         'payment_request_state' => $request->payment_request_state,
                         'pseReference1' => $request->pseReference1, 
                         'pseReference2' => $request->pseReference2, 
                         'pseReference3' => $request->pseReference3, 
                         'response_message_pol' => $request->response_message_pol,
                         'shipping_city' => $request->shipping_city, 
                         'shipping_country' => $request->shipping_country, 
                         'transaction_bank_id' => $request->transaction_bank_id, 
                         'transaction_id' => $request->transaction_id,
                         'payment_method_name' => $request->payment_method_name]);

        if($request->state_pol == 4 ) {
            $estado = "Aprobada";
        }
        elseif($request->state_pol == 6 ) {
            $estado = "Rechazada";
        }
        elseif($request->state_pol == 7 ) {
            $estado = "Pendiente";
        }
        else{
            $estado = $request->response_message_pol;
        }

        //Se envia mail al usuario informandole el estado de la transacción
        Mail::send('emailPayu', ['reference_sale' => $request->reference_sale, 'nickname_buyer' => $request->nickname_buyer, 'estado' => $estado, 'description' => $request->description, 'reference_pol' => $request->reference_pol, 'value' => $request->value, 'currency' => $request->currency, 'date' => $request->date, 'payment_method_name' => $request->payment_method_name], function ($message) use ($email, $emailAdmin){
            $message->sender($emailAdmin);
            $message->subject('Primera bienal internacional de arte neosurealista en Colombia – Transacción');
            $message->to($email);
        });

    }

}

public function confirmacion($id, Request $request){

    //Se obtiene la información de la inscripcion
    $inscripcion = DB::table('inscripcion as ins')
    ->join('artista as art','art.id','=','ins.artista_id')
    ->join('pais as pai','pai.id','=','art.pais_id')
    ->join('obra as obr','obr.id','=','ins.obra_id')
    ->select('ins.id as id_inscripcion',
        'ins.created_at as fecha_inscripcion',
        'art.nombre',
        'art.apellido',
        'art.pais_id',
        'art.lugar_nacimiento',
        'art.fecha_nacimiento',
        'art.direccion_postal',
        'art.direccion_domicilio',
        'art.email',
        'art.telefono_movil',
        'art.telefono_fijo',
        'art.perfil_artista_id',
        'art.ruta_hoja_vida',
        'obr.titulo',
        'obr.sintesis_conceptual',
        'obr.ruta_fotos_obra',
        'obr.tipo_obra',
        'obr.alto_medida',
        'obr.ancho_medida',
        'obr.peso',
        'obr.tema',
        'obr.tecnica',
        'obr.valor_venta',
        'pai.codigo'
        )
    ->where('ins.id', '=', $id)
    ->first();

    //Se evalua el currency y el valor a enviar segun el pais
    if($inscripcion->codigo == 'CO'){
        $currency = 'COP';
        $amount = 9000;
    }else{
        $currency = 'USD';
        $amount = 3;
    };

    $parametros = $this->traerParametro();

    //Datos reales
    $merchantId = $parametros['merchantId'];
    $accountId = $parametros['accountId'];
    $description = 'Primera bienal internacional de arte neosurealista en Colombia';
    $referenceCode = $id;
    $apiKey = $parametros['apiKey'];
    $tax = 0;
    $taxReturnBase = 0;
    $signature = $apiKey . '~' . $merchantId . '~' . $referenceCode . '~' . $amount . '~' . $currency;
    $signature = md5($signature);
    $responseUrl =  URL::to('/') . '/payurespuesta';
    $confirmationUrl = URL::to('/') . '/payuconfirmacion';
    $buyerEmail = $inscripcion->email;
    $buyerFullName = $inscripcion->nombre . ' ' . $inscripcion->apellido;
    $mobilePhone = $inscripcion->telefono_movil;
    $telephone = $inscripcion->telefono_fijo;
    $billingAddress = $inscripcion->direccion_postal;
    $shippingAddress = $inscripcion->direccion_postal;
    $shippingCountry = $inscripcion->codigo;
    $ambiente = 0; //1.test, 0.produccin
    $urlAmbiente = 'https://gateway.payulatam.com/ppp-web-gateway';

    //Pruebas
    /*$merchantId = $parametros['merchantId'];
    $accountId = $parametros['accountId'];
    $description = 'Registro evento Bienal pruebas Test PAYU';
    $referenceCode = 'bienal,arte,' . $id;
    $apiKey = $parametros['apiKey'];;
    $tax = 0;
    $taxReturnBase = 0;
    $signature = $apiKey . '~' . $merchantId . '~' . $referenceCode . '~' . $amount . '~' . $currency;
    $signature = md5($signature);
    $responseUrl =  URL::to('/') . '/payurespuesta';
    $confirmationUrl = URL::to('/') . '/payuconfirmacion';
    $buyerEmail = $inscripcion->email;
    $buyerFullName = $inscripcion->nombre . ' ' . $inscripcion->apellido;
    $mobilePhone = $inscripcion->telefono_movil;
    $telephone = $inscripcion->telefono_fijo;
    $billingAddress = $inscripcion->direccion_postal;
    $shippingAddress = $inscripcion->direccion_postal;
    $shippingCountry = $inscripcion->codigo;
    $ambiente = 1; //1.test, 0.produccin
    $urlAmbiente = 'https://sandbox.gateway.payulatam.com/ppp-web-gateway';*/

    return view('formPasarela', ['merchantId'      => $merchantId, 
                                 'accountId'       => $accountId,
                                 'description'     => $description,
                                 'referenceCode'   => $referenceCode,
                                 'currency'        => $currency,
                                 'amount'          => $amount,
                                 'tax'             => $tax,
                                 'taxReturnBase'   => $taxReturnBase,
                                 'signature'       => $signature,
                                 'responseUrl'     => $responseUrl,
                                 'confirmationUrl' => $confirmationUrl,
                                 'buyerEmail'      => $buyerEmail,
                                 'buyerFullName'   => $buyerFullName,
                                 'telephone'       => $telephone,
                                 'mobilePhone'     => $mobilePhone,
                                 'officeTelephone' => $mobilePhone,
                                 'billingAddress'  => $billingAddress,
                                 'shippingAddress' => $shippingAddress,
                                 'shippingCountry' => $shippingCountry,
                                 'ambiente'        => $ambiente,
                                 'urlAmbiente'     => $urlAmbiente]);
}

public function actualizarEstado(Request $request){
    $validator = $this->validatorAE($request->all());
    if($validator->fails()){
        return Redirect::route('inscripcion.show', $request->idInscripcion)->withErrors($validator)
                ->withInput();
    }else{
        $aceptado = $request->aceptado;
        if ($aceptado == 'on') {
            $marca = 1;
        }else{
            $marca = 0;
        }
        Inscripcion::where('id', $request->idInscripcion)
            ->update(['estado' => $request->estadoPayu,
                'aceptado' => $marca]);
        return Redirect::route('inscripcion.show', $request->idInscripcion);
    }
}

public function showEmail(){
    $artistas = Artista::groupBy('email')
                    ->get();
    return view('formEmail', ['artistas' => $artistas]);   
}

public function sendEmail(Request $request){
    $validator = $this->validatorEmail($request->all());
    if($validator->fails()){
        return Redirect::route('inscripcion.showemail')->withErrors($validator)
            ->withInput();
    }else{
        $parametros = $this->traerParametro('emailAdmin');
        $sender = $parametros['emailAdmin'];
        $subject = $request->subject;
        $to = $request->artista;
        Mail::send('email', ['mensaje' => $request->mensaje], function ($message) use ($sender, $subject, $to){
            $message->sender($sender);
            $message->subject($subject);
            $message->to($sender);
            $message->bcc($to);
        });
        return Redirect::route('inscripcion.showemail');
    }
}

private function validatorEmail(Array $array){
    $rules = [
                'subject' => 'required',
                'mensaje' => 'required',
                'artista' => 'required'
            ];
    return validator::make($array, $rules);
}

private function validatorAE(Array $array){
    $rules = [
    ];
    return validator::make($array, $rules);
}

public function traerParametro($parametro = 'all'){
    if($parametro != 'all'){
        $parametro = Parametro::where('parametro', $parametro)->pluck('valor','parametro')->all();
    }else{
        $parametro = Parametro::pluck('valor','parametro')->all();
    }
    return $parametro;
}


function listInscripciones($request){

    $inscripciones = Inscripcion::join('artista as art','art.id','=','inscripcion.artista_id')
    ->join('obra as obr','obr.id','=','inscripcion.obra_id')
    ->join('pais as p','p.id','=','art.pais_id')
    ->join('perfil_artista as per','per.id','=','art.perfil_artista_id')
    ->join('tecnica_obra as tec','tec.id','=','obr.tecnica')
    ->join('tema_obra as tem','tem.id','=','obr.tema')
    ->select('inscripcion.id as id_inscripcion',
        'inscripcion.created_at as fecha_inscripcion',
        'art.nombre',
        'art.apellido',
        'art.telefono_movil',
        'art.email',
        'p.pais',
        'per.perfil',
        'obr.titulo',
        'tem.tema',
        'tec.tecnica',
        'obr.valor_venta',
        DB::raw('(CASE WHEN inscripcion.estado IS NULL THEN "Pendiente" WHEN inscripcion.estado = 4 THEN "Aprobada" WHEN inscripcion.estado = 5 THEN "Expirada" WHEN inscripcion.estado = 6 THEN "Declinada" WHEN inscripcion.estado = 0 THEN "Pendiente" END) as estado'),
        DB::raw('(CASE WHEN inscripcion.aceptado IS NULL THEN "No" WHEN inscripcion.aceptado = 1 THEN "Si" WHEN inscripcion.aceptado = 0 THEN "No" END) as aceptado'));
    if($request->id){
        $inscripciones = $inscripciones->where('inscripcion.id', '=', $request->id);
    }
    if($request->nombre){
        $inscripciones = $inscripciones->where('art.nombre', 'like', '%' . $request->nombre . '%');
    }
    if($request->apellido){
        $inscripciones = $inscripciones->where('art.apellido', 'like', '%' . $request->apellido . '%');
    }
    if($request->titulo){
        $inscripciones = $inscripciones->where('obr.titulo', 'like', '%' . $request->titulo . '%');
    }

    return $inscripciones;
}

}

