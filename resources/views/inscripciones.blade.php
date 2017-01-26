@extends('layouts.app')

@section('content')

@section('title', 'Artistas')
	
	<!--Formulario-->
	{!!Form::open(['route' => 'inscripcion.index', 'method'=>'GET', 'id'=>'form-filtros', 'class'=>'form-inline' ])!!}
		{!!csrf_field()!!}
		<div class="panel-group">
			<div class="panel panel-warning" id="panelbienal">
				<div class="panel-heading headingBienal">Artistas Inscritos</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<div class='form-group'>
									<label for='id'>ID</label>
									<input type="text" name="id" value="{{$request->id}}">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<div class='form-group'>
									<label for='nombre'>Nombre</label>
									<input type="text" name="nombre" value="{{$request->nombre}}">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<div class='form-group'>
									<label for='apellido'>Apellido</label>
									<input type="text" name="apellido" value="{{$request->apellido}}">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<div class='form-group'>
									<label for='titulo'>Título</label>
									<input type="text" name="titulo" value="{{$request->titulo}}">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-warning botonBienal">
							<i class="fa fa-btn fa-search"></i> Buscar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	{!!Form::close()!!}
	
	<!--Tabla registros -->
	<div class="panel-group">
		<div class="panel panel-warning" id="panelbienal">
			<div class="panel-heading headingBienal">Artistas Inscritos</div>
			<div class="panel-body">
				<table class='table table-condensed'>
					<thead>
						<tr>
							<th>
								Id
							</th>
							<th>
								Nombres
							</th>
							<th>
								Apellidos
							</th>
							<th>
								Titulo
							</th>
							<th>
								Valor venta
							</th>
							<th>
								Detalle
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($inscripciones as $inscripcion)
							<tr>
								<td>
									{{$inscripcion->id_inscripcion}}
								</td>
								<td>
									{{$inscripcion->nombre}}
								</td>
								<td>
									{{$inscripcion->apellido}}
								</td>
								<td>
									{{$inscripcion->titulo}}
								</td>
								<td>
									{{$inscripcion->valor_venta}}
								</td>
								<td>
									<a class="btn btn-warning botonBienal" href='{{route("inscripcion.show",$inscripcion->id_inscripcion)}}'><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection