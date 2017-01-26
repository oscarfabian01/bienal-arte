@extends('layouts.app')

@section('title','Redactar email')

@section('content')
	
	<div class="panel-group">
		<div class="panel panel-warning" id="panelbienal">
			<div class="panel-body">
				{!!Form::open(['route' => 'inscripcion.sendemail', 'method' => 'POST', 'id' => 'form-mail', 'enctype' => "multipart/form-data"])!!}
					<div class="row">
						@foreach($artistas as $artista)
							<div class="col-md-12">
								<input type="checkbox" name="artista[]" value="{{$artista->email}}">
								{{$artista->nombre}} {{$artista->apellido}}
							</div>
						@endforeach
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<label for="asunto">Asunto</label>
							<input type="text" name="subject" class="form-control {{ $errors->has('subject') ? ' has-error' : '' }}" value="{{@old(subject)}}">
							@if ($errors->has('subject'))
								<span>
									<strong class="alertval">{{ $errors->first('subject') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="mensaje">Mensaje</label>
							<textarea id=mensaje name="mensaje" class="form-control {{ $errors->has('mensaje') ? ' has-error' : '' }}" value="{{@old(mensaje)}}"></textarea>
							@if ($errors->has('mensaje'))
								<span>
									<strong class="alertval">{{ $errors->first('mensaje') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-warning">Enviar</button>
						</div>
					</div>
				{!!Form::close()!!} 
			</div>
		</div>
	</div>

@endsection