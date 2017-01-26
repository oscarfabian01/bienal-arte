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
					<strong> Pais: </strong> {{$inscripcion->pais}}
				</div>
				<div class="col-md-6">
					<strong> Lugar de nacimiento: </strong> {{$inscripcion->lugar_nacimiento}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Fecha de nacimiento: </strong> {{$inscripcion->fecha_nacimiento}}
				</div>
				<div class="col-md-6">
					<strong> Dirección postal: </strong> {{$inscripcion->direccion_postal}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Email: </strong> {{$inscripcion->email}}
				</div>
				<div class="col-md-6">
					<strong> Teléfono fijo: </strong> {{$inscripcion->telefono_fijo}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">						
					<strong> Teléfono móvil: </strong> {{$inscripcion->telefono_movil}}	
				</div>
				<div>
					<strong> Perfil artista: </strong> {{$inscripcion->perfil}}
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
					<strong> Valor Venta: </strong> {{$inscripcion->valor_venta}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Tipo obra: </strong> {{$inscripcion->titulo}}
				</div>
				<div class="col-md-6">
					<strong> Alto: </strong> {{$inscripcion->alto_medida}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Ancho: </strong> {{$inscripcion->ancho_medida}}
				</div>
				<div class="col-md-6">
					<strong> Peso: </strong> {{$inscripcion->peso}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">
					<strong> Tema: </strong> {{$inscripcion->tema}}
				</div>
				<div class="col-md-6">
					<strong> Técnica: </strong> {{$inscripcion->tecnica}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-12">
					<strong> Sintesis conceptual: </strong> {{$inscripcion->titulo}}
				</div>
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
						<button class="btn btn-primary botonBienal"l>Guardar</button>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection