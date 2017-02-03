@extends('layouts.app')

@section('title','Redactar email')

@section('content')
	
	<div class="panel-group">
		<div class="panel panel-warning" id="panelbienal">
			<div class="panel-heading headingBienal">Envio de correos masivos</div>
			<div class="panel-body">
				{!!Form::open(['route' => 'inscripcion.sendemail', 'method' => 'POST', 'id' => 'form-mail', 'enctype' => "multipart/form-data"])!!}
					<div class="row">
						<div class="col-md-12">
							<label for="artista">Para</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{{$emails}}
							<input type="hidden" name="emails" value="{{$emails}}">
							@if ($errors->has('emails'))
								<span>
									<strong class="alertval">{{ $errors->first('emails') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
								<label for="asunto">Asunto</label>
								<input type="text" name="subject" class="form-control" value="{{@old(subject)}}">
								@if ($errors->has('subject'))
									<span>
										<strong class="alertval">{{ $errors->first('subject') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('mensaje') ? ' has-error' : '' }}">
								<label for="mensaje">Mensaje</label>
								<textarea id=mensaje name="mensaje" class="form-control" value="{{@old(mensaje)}}"></textarea>
								@if ($errors->has('mensaje'))
									<span>
										<strong class="alertval">{{ $errors->first('mensaje') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-warning botonBienal">Enviar</button>
						</div>
					</div>
				{!!Form::close()!!} 
			</div>
		</div>
	</div>

@endsection