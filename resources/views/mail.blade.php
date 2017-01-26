@extends('layouts.app')

@section('title','Redactar email')

@section('content')
	
	<div class="panel-group">
		<div class="panel panel-warning" id="panelbienal">
			<div class="panel-body">
				{!!Form::open(['route' => 'inscripcion.store', 'method' => 'POST', 'id' => 'form-inscripcion', 'enctype' => "multipart/form-data"])!!}
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
							<input type="text" name="asunto" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="mensaje">Mensaje</label>
							<textarea id=mensaje name="mensaje" class="form-control"></textarea>
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