@extends('layouts.app')
@section('title','Inscripcion')

@section('content')
<div class="panel-group">
	<div class="panel panel-warning" id="panelbienal">
		<div class="panel-heading headingBienal">Inscripción</div>
		<div class="panel-body">
			<div class='row'>
				<div class="col-md-6">
					<strong>ID inscripción: </strong> {{$inscripcion->id_inscripcion}}
				</div>
				<div class="col-md-6">
					<strong>Fecha de inscripción: </strong> {{$inscripcion->fecha_inscripcion}}
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-warning" id="panelbienal">
		<div class="panel-heading headingBienal">Artista</div>
		<div class="panel-body">
			<div class='row'>
				<div class="col-md-6">
					<strong> Nombre: </strong> {{$inscripcion->nombre}}
				</div>
				<div class="col-md-6">
					<strong> Apellido: </strong> {{$inscripcion->apellido}}
				</div>
			</div>	
			<div class='row'>
				<div class="col-md-6">
					<strong> Lugar de nacimiento: </strong> {{$inscripcion->lugar_nacimiento}}
				</div>
				<div class="col-md-6">
					<strong> Fecha de nacimiento: </strong> {{$inscripcion->fecha_nacimiento}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Dirección domicilio: </strong> {{$inscripcion->direccion_domicilio}}
				</div>
				<div class="col-md-6">
					<strong> Dirección postal: </strong> {{$inscripcion->direccion_postal}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Teléfono fijo: </strong> {{$inscripcion->telefono_fijo}}
				</div>
				<div class="col-md-6">						
					<strong> Teléfono móvil: </strong> {{$inscripcion->telefono_movil}}	
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Pais: </strong> {{$inscripcion->pais}}
				</div>
				<div class="col-md-6">
					<strong> Email: </strong> {{$inscripcion->email}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Perfil artista: </strong> {{$inscripcion->perfil}}
				</div>
				<div class="col-md-6">
					<strong> Hoja de vida: </strong> <a href="{{URL::asset($hojaVida)}}" target="_blank"> Descargar</a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-warning" id="panelbienal">
		<div class="panel-heading headingBienal">Obra</div>
		<div class="panel-body">
			<div class='row'>
				<div class="col-md-6">
					<strong> Título: </strong> {{$inscripcion->titulo}}
				</div>
				<div class="col-md-6">
					@if(!empty($inscripcion->valor_venta))
						<strong> Valor Venta: </strong> {{number_format($inscripcion->valor_venta,0,',','.')}}
					@else
						<strong> No esta en venta</strong>
					@endif
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Tipo obra: </strong> {{$inscripcion->titulo}}
				</div>
				<div class="col-md-6">
					<strong> Tema: </strong> {{$inscripcion->tema}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Alto: </strong> {{$inscripcion->alto_medida}}
				</div>
				<div class="col-md-6">
					@if(!empty($inscripcion->ancho_medida))
						<strong> Ancho: </strong> {{$inscripcion->ancho_medida}}
					@endif
					@if(!empty($inscripcion->peso))
						<strong> Peso: </strong> {{$inscripcion->peso}}
					@endif
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Técnica: </strong> {{$inscripcion->tecnica}}
				</div>
				<div class="col-md-6">
					<strong> Fotos Obra: </strong> <a href="{{URL::asset($fotos)}}" target="_blank"> Descargar</a>
				</div>
			</div>
			<div class='row'>
				@if(!empty($inscripcion->sintesis_archivo))
					<div class="col-md-12">
						<strong> Sintesis archivo: </strong> <a href="{{URL::asset($sintesisArchivo)}}" target="_blank"> 
						Descargar</a>
					</div>
				@endif
				@if(!empty($inscripcion->sintesis_conceptual))
					<div class="col-md-12">
						<strong> Sintesis conceptual: </strong> {{$inscripcion->sintesis_conceptual}}
					</div>
				@endif
			</div>
		</div>
	</div>
	<!--Formulario-->
	<div class="panel panel-warning" id="panelbienal">
		<div class="panel-heading headingBienal">Estado Payu</div>
		<div class="panel-body">
			{!!Form::open(['route' => 'inscripcion.actualizarestado', 'method'=>'PUT', 'id'=>'form-filtros', 'class'=>'form-inline' ])!!}
				{!!csrf_field()!!}
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="idInscripcion" value="{{$inscripcion->id_inscripcion}}">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('estadoPayu') ? ' has-error' : '' }}">
							<label for="estadoPayu">Estado</label>
							<select name="estadoPayu" id="estadoPayu" class="form-control">
								<option value="0" @if($inscripcion->estado == 0) selected="selected" @endif>Seleccionar</option>
								<option value="4" @if($inscripcion->estado == 4) selected="selected" @endif>Aprobada</option>
								<option value="5" @if($inscripcion->estado == 5) selected="selected" @endif>Expirada</option>
								<option value="6" @if($inscripcion->estado == 6) selected="selected" @endif>Declinada</option>
							</select>
							@if ($errors->has('estadoPayu'))
								<span>
									<strong class="alertval">{{ $errors->first('estadoPayu') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<button class="btn btn-warning botonBienal"><i class="fa fa-floppy-o" aria-hidden="true"></i>
						 Guardar</button>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection