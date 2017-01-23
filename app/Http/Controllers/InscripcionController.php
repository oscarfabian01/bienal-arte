<?php

namespace App\Http\Controllers;

use App\payuFactura;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\Artista;
use App\Inscripcion;
use App\Obra;
use Storage;
use Illuminate\Support\Facades\Redirect;
use Mail;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $inscripciones = DB::table('inscripcion as ins')
        ->join('artista as art','art.id','=','ins.artista_id')
        ->join('obra as obr','obr.id','=','ins.obra_id')
        ->select('ins.id as id_inscripcion',
            'ins.created_at as fecha_inscripcion',
            'art.nombre',
            'art.apellido',
            'obr.titulo',
            'obr.valor_venta'
            );
        if($request->id){
            $inscripciones = $inscripciones->where('ins.id', '=', $request->id);
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

        $inscripciones = $inscripciones->paginate(10);

        return view('inscripciones', ['inscripciones' => $inscripciones, 'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$validator = $this->validator($request->all());

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
                ,'fecha_nacimiento' => $request->Fnacimiento
                ,'direccion_postal' => $request->direccion
                ,'email' => $request->email
                ,'telefono_movil' => $request->telMovil
                ,'perfil_artista' => $request->perfil
                ,'ruta_hoja_vida' => $cvRoute
            ]);

            $fotosObra = $request->file('fotosObra');

            $fotosObraRoute = time().'_'.$fotosObra->getClientOriginalName();

            Storage::disk('fotos')->put($fotosObraRoute, file_get_contents( $fotosObra->getRealPath() ));

            $obra = Obra::create(['titulo' => $request->titulo
                ,'sintesis_conceptual' => $request->sintesis
                ,'ruta_fotos_obra' => $fotosObraRoute
                ,'tipo_obra' => $request->tipoObra
                ,'alto_medida' => $request->alto
                ,'ancho_medida' => $request->ancho
                ,'peso' => $request->peso
                ,'tema' => $request->tema
                ,'tecnica' => $request->tecnica
                ,'valor_venta' => $request->venta
            ]);
        }

            $inscripcion = Inscripcion::create(['artista_id' => $artista->id, 'obra_id' => $obra->id])*/

        return redirect::route('inscripcion.confirmacion', ['id' => 1]);

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
            ,'direccion' => 'required|max:255'
            ,'email' => 'required|email|max:255'
            ,'telMovil' => 'required|numeric'
            ,'perfil' => 'required|numeric|not_in:0'
            ,'cv' => 'required|mimes:doc,pdf'
            ,'titulo' => 'required|max:255'
            ,'sintesis' => 'required|max:255'
            ,'tema' => 'required|numeric|not_in:0'
            ,'tecnica' => 'required|numeric|not_in:0'
            ,'fotosObra' => 'required|mimes:doc,pdf'
            ,'alto' => 'required|numeric'
            ,'tipoObra' => 'required|numeric|not_in:0'
            ,'anchop' => 'numeric'
            ,'peso' => 'numeric'

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
        ->join('obra as obr','obr.id','=','ins.obra_id')
        ->select('ins.id as id_inscripcion',
            'ins.created_at as fecha_inscripcion',
            'art.nombre',
            'art.apellido',
            'art.pais_id',
            'art.fecha_nacimiento',
            'art.direccion_postal',
            'art.email',
            'art.telefono_movil',
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
            'obr.valor_venta'
            )
        ->where('ins.id', '=', $id)
        ->first();

        return view('inscripcion', compact('inscripcion'));
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

    /**
     * Página de respuesta payU
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function payUresponse(Request $request){
        $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
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
     * Operaciones de confirmación
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function payUconfirmation(Request $request){
        $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
        $New_value = number_format($request->value, 1, '.', '');
        $firma_cadena = "$ApiKey~$request->merchant_id~$request->reference_sale~$New_value~$request->currency~$request->state_pol";
        $firmaCreada = md5($firma_cadena);
        $firma = $request->merchant_id;

        if (strtoupper($firma) == strtoupper($firmacreada)) {
            payuFactura::update(['merchant_id' => $request->merchant_id, 
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

            Mail::send('emailPayu', ['reference_sale'=> $request->reference_sale, 'nickname_buyer' => $nickname_buyer], function ($message){
                $message->sender('oscarfabian01@gmail.com');
                $message->subject('Asunto del correo');
                $message->to('oscarfabian01@gmail.com');
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
            'art.email',
            'art.telefono_movil',
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
            $amount = 50000;
        }else{
            $currency = 'USD';
            $amount = 25;
        };

        //Datos reales
        /*$merchantId = 617638;
        $accountId = 620305;
        $description = 'Registro evento Bienal';
        $referenceCode = $id;
        $apiKey = '6WXWkPZ75cjrMback06QTFwNWn';
        $tax = 0;
        $taxReturnBase = 0;
        $signature = $apiKey . '~' . $merchantId . '~' . $referenceCode . '~' . $amount . '~' . $currency;
        $signature = md5($signature);
        $responseUrl = 'http://www.test.com/response';
        $confirmationUrl = 'http://www.test.com/confirmation';
        $buyerEmail = $inscripcion->email;
        $buyerFullName = $inscripcion->nombre . ' ' . $inscripcion->apellido;
        $mobilePhone = $inscripcion->telefono_movil;
        $billingAddress = $inscripcion->direccion_postal;
        $shippingAddress = $inscripcion->direccion_postal;
        $shippingCountry = $inscripcion->codigo;
        $ambiente = 1; //1.test, 0.produccin
        $urlAmbiente = 'https://gateway.payulatam.com/ppp-web-gateway';*/

        //Pruebas
        $merchantId = 508029;
        $accountId = 512321;
        $description = 'Registro evento Bienal pruebas Test PAYU';
        $referenceCode = 'bienal10';
        $apiKey = '4Vj8eK4rloUd272L48hsrarnUA';
        $tax = 0;
        $taxReturnBase = 0;
        $signature = $apiKey . '~' . $merchantId . '~' . $referenceCode . '~' . $amount . '~' . $currency;
        $signature = md5($signature);
        $responseUrl = 'http://www.test.com/response';
        $confirmationUrl = 'http://www.test.com/confirmation';
        $buyerEmail = $inscripcion->email;
        $buyerFullName = $inscripcion->nombre . ' ' . $inscripcion->apellido;
        $mobilePhone = $inscripcion->telefono_movil;
        $billingAddress = $inscripcion->direccion_postal;
        $shippingAddress = $inscripcion->direccion_postal;
        $shippingCountry = $inscripcion->codigo;
        $ambiente = 1; //1.test, 0.produccin
        $urlAmbiente = 'https://sandbox.gateway.payulatam.com/ppp-web-gateway';

        Mail::send('emailPayu', ['reference_sale'=> $referenceCode, 'nickname_buyer' => $buyerFullName], function ($message){
            $message->sender('oscarfabian01@gmail.com');
            $message->subject('Asunto del correo');
            $message->to('oscarfabian01@gmail.com');
        });

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
                                     'telephone'       => $mobilePhone,
                                     'mobilePhone'     => $mobilePhone,
                                     'officeTelephone' => $mobilePhone,
                                     'billingAddress'  => $billingAddress,
                                     'shippingAddress' => $shippingAddress,
                                     'shippingCountry' => $shippingCountry,
                                     'ambiente'        => $ambiente,
                                     'urlAmbiente'     => $urlAmbiente]);
    }
}
