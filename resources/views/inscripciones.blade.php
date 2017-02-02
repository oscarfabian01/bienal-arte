@extends('layouts.app')

@section('content')

@section('title', 'Artistas')

@section('resources')
	<script type="text/javascript" src="{{URL::asset('js/jquery.tablesorter.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/jquery-ui.js')}}"></script>
@endsection
	
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
				<div class="table-responsive">
					<table id="tableArtistas" class='table table-condensed tablesorter'>
						<thead>
							<tr>
								<th>
								</th>
								<th>
									Id
								</th>
								<th>
									Fecha inscripción
								</th>
								<th>
									Nombres
								</th>
								<th>
									Apellidos
								</th>
								<th>
									Teléfono Movil
								</th>
								<th>
									Correo
								</th>
								<th>
									País
								</th>
								<th>
									Perfil
								</th>
								<th>
									Titulo Obra
								</th>
								<th>
									Tema
								</th>
								<th>
									Técnica
								</th>
								<th>
									Valor venta
								</th>
								<th>
									Estado Transacción
								</th>
								<th>
									Aceptado
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
										<input type="checkbox" name="artistasEmail"" value="{{$inscripcion->email}}" class="checkEmail">
									</td>
									<td>
										{{$inscripcion->id_inscripcion}}
									</td>
									<td>
										{{$inscripcion->fecha_inscripcion}}
									</td>
									<td>
										{{$inscripcion->nombre}}
									</td>
									<td>
										{{$inscripcion->apellido}}
									</td>
									<td>
										{{$inscripcion->telefono_movil}}
									</td>
									<td>
										{{$inscripcion->email}}
									</td>
									<td>
										{{$inscripcion->pais}}
									</td>
									<td>
										{{$inscripcion->perfil}}
									</td>
									<td>
										{{$inscripcion->titulo}}
									</td>
									<td>
										{{$inscripcion->tema}}
									</td>
									<td>
										{{$inscripcion->tecnica}}
									</td>
									<td>
										@if(!empty($inscripcion->valor_venta))
											{{number_format($inscripcion->valor_venta,0,',','.')}}
										@else
											No esta en venta
										@endif
									</td>
									<td>
										{{$inscripcion->estado}}
									</td>
									<td>
										{{$inscripcion->aceptado}}
									</td>
									<td>
										<a class="btn btn-warning botonBienal" href='{{route("inscripcion.show",$inscripcion->id_inscripcion)}}'><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{$inscripciones->links()}}
				</div>
				<div class="row">
					<div class="col-md-6">
						{!!Form::open(['route' => 'inscripcion.showexcel', 'method'=>'GET', 'id'=>'form-excel'])!!}
						{!!csrf_field()!!}
							<input type="hidden" name="id" class="form-control" value="{{$request->id}}">
							<input type="hidden" name="nombre" class="form-control" value="{{$request->nombre}}">
							<input type="hidden" name="apellido" class="form-control" value="{{$request->apellido}}">
							<input type="hidden" name="titulo" class="form-control" value="{{$request->titulo}}">
							<button type="submit" class="btn btn-warning botonBienal">
							<i class="fa fa-btn fa-search"></i> Descargar Excel</button>
						{!!Form::close()!!}
					</div>
					<div class="col-md-6">
						{!!Form::open(['route' => 'inscripcion.showemail', 'method'=>'GET', 'id'=>'form-email-inscripcion'])!!}
						{!!csrf_field()!!}
							<input type="hidden" name="emails" id="emails" value="">
							@if ($errors->has('emails'))
								<span>
									<strong class="alertval">{{ $errors->first('emails') }}</strong>
								</span>
							@endif
							<button type="submit" class="btn btn-warning botonBienal">				
							<i class="fa fa-btn fa-send"></i> Enviar Email</button>
						{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(document).ready(function(){
			var emails;
			$("#tableArtistas").tablesorter();
			
			$(".checkEmail").click(function(){
				emails = '';
				$("input:checkbox[name=artistasEmail]:checked").each(function(){
	   				emails =  $(this).val() + ',' + emails;
				});
				emails = emails.slice(0,-1);
				$('#emails').val(emails);
			})
		})
	</script>
@endsection