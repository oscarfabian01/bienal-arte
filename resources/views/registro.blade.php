@extends('layout')

@section('title', 'Registro')

@section('resources')
	
<!-- jquery UI CSS -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/jquery-ui.css')}}">

<!-- jquery UI JS -->
<script type="text/javascript" src="{{URL::asset('js/jquery-ui.js')}}"></script>

@endsection

@section('content')
		
	<div class="panel-group">
		<div class="panel panel-info">
			<div class="panel-heading">INSCRIPCION</div>
			<div class="panel-body">
				{!!Form::open(['route' => 'inscripcion.store', 'method' => 'POST', 'id' => 'form-inscripcion', 'enctype' => "multipart/form-data"])!!}
				{!!csrf_field()!!}
					<fieldset>
						<legend><strong>Formulario de inscripción 2017</strong></legend>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
									<label for="nombre">Nombres</label>
									<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
									@if ($errors->has('nombre'))
									<span>
										<strong>{{ $errors->first('nombre') }}</strong>
									</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('apellido') ? ' has-error' : '' }}">
									<label for="apellido">Apellidos</label>
									<input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido')}}">
									@if ($errors->has('apellido'))
										<span>
											<strong>{{ $errors->first('apellido') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('pais') ? ' has-error' : '' }}">
									<label for="pais">País</label>
									<select name="pais" id="pais" class="form-control">
										<option value="0">--Seleccionar--</option>
										@foreach($pais as $rowPais)
											<option value="{{$rowPais->id}}">{{$rowPais->pais}}</option>
										@endforeach
									</select>
									@if ($errors->has('pais'))
										<span>
											<strong>{{ $errors->first('pais') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('Lnacimiento') ? ' has-error' : '' }}">
									<label for="Lnacimiento">Lugar Nacimiento</label>
									<input type="text" name="Lnacimiento" id="Lnacimiento" class="form-control" value="{{old('Lnacimiento')}}">
									@if ($errors->has('pais'))
										<span>
											<strong>{{ $errors->first('pais') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('Fnacimiento') ? ' has-error' : '' }}">
									<label for="Fnacimiento">Fecha Nacimiento</label>
									<input type="text" name="Fnacimiento" id="Fnacimiento" class="form-control calendario" value="{{old('Fnacimiento')}}">
									@if ($errors->has('Fnacimiento'))
										<span>
											<strong>{{ $errors->first('Fnacimiento') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
									<label for="direccion">Dirección Postal</label>
									<input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}">
									@if ($errors->has('direccion'))
										<span>
											<strong>{{ $errors->first('direccion') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
									@if ($errors->has('email'))
										<span>
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('telMovil') ? ' has-error' : '' }}">
									<label for="telMovil">Teléfono Movil</label>
									<input type="text" name="telMovil" id="telMovil" class="form-control" value="{{old('telMovil')}}">
									@if ($errors->has('telMovil'))
										<span>
											<strong>{{ $errors->first('telMovil') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('perfil') ? ' has-error' : '' }}">
									<label for="perfil">Perfil del artista</label>
									<select name="perfil" id="perfil" class="form-control" value="{{old('perfil')}}">
										<option value="0">-- Seleccionar --</option>
										@foreach($perfilArtista as $rowPerfilArtista)
												<option value="{{$rowPerfilArtista->id}}">{{$rowPerfilArtista->perfil}}</option>
										@endforeach
									</select>
									@if ($errors->has('perfil'))
										<span>
											<strong>{{ $errors->first('perfil') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('cv') ? ' has-error' : '' }}">
									<label for="cv">Hoja de vida</label>
									<input type="file" name="cv" id="cv" class="form-control-file" value="{{old('cv')}}">
									@if ($errors->has('cv'))
										<span>
											<strong>{{ $errors->first('cv') }}</strong>
										</span>
									@endif
								</div>
							</div>
						</div>
						<fieldset>
							<legend><strong>Información Obra</strong></legend>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
										<label for="titulo">Titulo</label>
										<input type="text" name="titulo" id="titulo" class="form-control" value="{{old('titulo')}}">
										@if ($errors->has('titulo'))
											<span>
												<strong>{{ $errors->first('titulo') }}</strong>
											</span>
										@endif
									</div>
									<div class="form-group {{ $errors->has('sintesis') ? ' has-error' : '' }}">
										<label for="sintesis">Sintesis conceptual de la obra</label>
										<textarea name="sintesis" id="sintesis" class="form-control">{{old('sintesis')}}</textarea>
										@if ($errors->has('sintesis'))
											<span>
												<strong>{{ $errors->first('sintesis') }}</strong>
											</span>
										@endif
									</div>						
									<fieldset class="form-group">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group {{ $errors->has('tipoObra') ? ' has-error' : '' }}">
													<label for="tipoObra">Tipo de obra</label>
													<input type="radio" name="tipoObra" class='tipoObra' value="1" checked="checked"> Pintura
		  											<input type="radio" name="tipoObra" class='tipoObra' value="2"> Escultura
													@if ($errors->has('tipoObra'))
													<span>
														<strong>{{ $errors->first('tipoObra') }}</strong>
													</span>
													@endif
												</div>
											</div>
											<div class="col-md-12">
												<div class="row">
													<div id="content-ancho" class="col-md-6">
														<div class="form-group {{ $errors->has('ancho') ? ' has-error' : '' }}">
															<label for="ancho">Ancho(cm)</label>
															<input type="text" name="ancho" id="ancho" class="form-control" value="{{old('ancho')}}">
															@if ($errors->has('ancho'))
															<span>
																<strong>{{ $errors->first('ancho') }}</strong>
															</span>
															@endif
														</div>
													</div>
													<div id="content-alto" class="col-md-6">
														<div class="form-group {{ $errors->has('alto') ? ' has-error' : '' }}">
															<label for="alto">Alto(cm)</label>
															<input type="text" name="alto" id="alto" class="form-control" value="{{old('alto')}}">
															@if ($errors->has('alto'))
															<span>
																<strong>{{ $errors->first('alto') }}</strong>
															</span>
															@endif
														</div>
													</div>
													<div id="content-peso" class="col-md-6">
														<div class="form-group {{ $errors->has('peso') ? ' has-error' : '' }}" >
															<label for="peso">Peso(kg)</label>
															<input type="text" name="peso" id="peso" class="form-control" value="{{old('peso')}}">
															@if ($errors->has('peso'))
															<span>
																<strong>{{ $errors->first('peso') }}</strong>
															</span>
															@endif
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('tema') ? ' has-error' : '' }}">
										<label for="tema">Tema</label>
										<select name="tema" id="tema" class="form-control" value="{{old('tema')}}">
											<option value="0">-- Seleccionar --</option>
											@foreach($temaObra as $rowtemaObra)
												<option value="{{$rowtemaObra->id}}">{{$rowtemaObra->tema}}</option>
											@endforeach
										</select>
										@if ($errors->has('tema'))
											<span>
												<strong>{{ $errors->first('tema') }}</strong>
											</span>
										@endif
									</div>
									<div class="form-group {{ $errors->has('tecnica') ? ' has-error' : '' }}">
										<label for="tecnica">Técnica</label>
										<select name="tecnica" id="tecnica" class="form-control" value="{{old('tecnica')}}">
											<option value="0">-- Seleccionar --</option>
											@foreach($tecnicaObra as $rowtecnicaObra)
												@if($rowtecnicaObra->id == 4)
													<option value="{{$rowtecnicaObra->id}}" disabled="disabled">{{$rowtecnicaObra->tecnica}}</option>
												@else
													<option value="{{$rowtecnicaObra->id}}">{{$rowtecnicaObra->tecnica}}</option>
												@endif
											@endforeach
										</select>
										@if ($errors->has('tecnica'))
											<span>
												<strong>{{ $errors->first('tecnica') }}</strong>
											</span>
										@endif
									</div>
									<fieldset class="form-group">
										<div class="row">
											<div class="col-md-2">
												<div class="form-check">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="ventaC" id="ventaC" value="1">
														Venta
													</label>
												</div>
											</div>
											<div class="col-md-10">
												<div class="form-group" id="valorDiv">
													<label for="venta">Valor</label>
													<input type="text" name="venta" id="venta" class="form-control" value="{{old('venta')}}">
												</div>
											</div>
										</div>
									</fieldset>
									<div class="form-group {{ $errors->has('fotosObra') ? ' has-error' : '' }}">
										<label for="fotosObra">Fotos Obra</label>
										<input type="file" name="fotosObra" id="fotosObra" class="form-control-file" value="{{old('fotosObra')}}">
										@if ($errors->has('fotosObra'))
											<span>
												<strong>{{ $errors->first('fotosObra') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
						</fieldset>
					</fieldset>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>
					</div>
				{!!Form::close()!!} 	
			</div>
		</div>
	</div>
	

@endsection

@section('scripts')
	<script type="text/javascript" src="{{URL::asset('scripts/calendar.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('scripts/campos.js')}}"></script>
@endsection