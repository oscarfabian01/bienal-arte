@extends('layouts.app')

@section('content')

@section('title', 'Artistas')
	
	<!--Formulario-->
	
		<div class="panel-group">
			<div class="panel panel-warning" id="panelbienal">
				<div class="panel-heading headingBienal">Artistas Inscritos</div>
				<div class="panel-body">
					{!!Form::open(['route' => 'inscripcion.index', 'method'=>'GET', 'id'=>'form-filtros'])!!}
					{!!csrf_field()!!}
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for='id'>ID</label>
								<input type="text" name="id" class="form-control" value="{{$request->id}}">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for='nombre'>Nombre</label>
								<input type="text" name="nombre" class="form-control" value="{{$request->nombre}}">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for='apellido'>Apellido</label>
								<input type="text" name="apellido" class="form-control" value="{{$request->apellido}}">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for='titulo'>Título</label>
								<input type="text" name="titulo" class="form-control" value="{{$request->titulo}}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<button type="submit" class="btn btn-warning botonBienal">
								<i class="fa fa-btn fa-search"></i> Buscar</button>
							</div>
						</div>
					</div>
				{!!Form::close()!!}
				</div>
			</div>
		</div>
	
	
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
								Estado Transacción
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
									@if(!empty($inscripcion->valor_venta))
										{{number_format($inscripcion->valor_venta,0,',','.')}}
									@else
										No esta en venta
									@endif
								</td>
								<td>
									@if($inscripcion->estado==4)
										Aprobada
									@elseif($inscripcion->estado==5)
										Expirada
									@elseif($inscripcion->estado==5)
										Declinada
									@else
										Creado
									@endif
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