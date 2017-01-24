@extends('layouts.app')
@section('title','Inscripcion')

@section('content')
<div class="panel-group">
	<div class="panel panel-info">
		<div class="panel-heading">Inscripción</div>
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
	<div class="panel panel-info">
		<div class="panel-heading">Artista</div>
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
					<strong> Teléfono movil: </strong> {{$inscripcion->telefono_movil}}
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6">						
					<strong> Perfil artista: </strong> {{$inscripcion->perfil}}
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">Obra</div>
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
	<div class="panel panel-primary">
		<div class="panel-heading">Formulario</div>
		<div class="panel-body">
			{!!Form::open(['route' => 'inscripcion.actualizarestado', 'method'=>'PUT', 'id'=>'form-filtros', 'class'=>'form-inline' ])!!}
				{!!csrf_field()!!}
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="idInscripcion" value="{{$inscripcion->id_inscripcion}}">
				<div class="form-group">
					<label for="estadoPayu">Estado</label>
					<select name="estadoPayu">

					</select>
				</div>
				<button>Guardar</button>
			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection