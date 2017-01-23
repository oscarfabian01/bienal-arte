@extends('layout')
@section('title','Inscripcion')

@section('content')
<div class="panel-group">
	<div class="panel panel-info">
		<div class="panel-heading">Inscripción</div>
		<div class="panel-body">
			ID inscripción{{$inscripcion->id_inscripcion}}
			Fecha de inscripción: {{$inscripcion->fecha_inscripcion}}
		</div>
	</div>
	<div class="panel panel-info">
		<div class="panel-heading">Artista</div>
		<div class="panel-body">
			Nombre: {{$inscripcion->nombre}}
			Apellido: {{$inscripcion->apellido}}
			Pais: {{$inscripcion->pais_id}}
			Fecha de nacimiento: {{$inscripcion->fecha_nacimiento}}
			Dirección postal: {{$inscripcion->direccion_postal}}
			Email: {{$inscripcion->email}}
			Teléfono movil: {{$inscripcion->telefono_movil}}
			Perfil artista: {{$inscripcion->telefono_movil}}
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">Obra</div>
		<div class="panel-body">
			Título: {{$inscripcion->titulo}}
			Sintesis conceptual: {{$inscripcion->titulo}}
			Tipo obra: {{$inscripcion->titulo}}
			Alto: {{$inscripcion->alto_medida}}
			Ancho: {{$inscripcion->ancho_medida}}
			Peso: {{$inscripcion->peso}}
			Tema: {{$inscripcion->tema}}
			Técnica: {{$inscripcion->tecnica}}
			Valor Venta: {{$inscripcion->valor_venta}}
		</div>
	</div>
</div>
@endsection