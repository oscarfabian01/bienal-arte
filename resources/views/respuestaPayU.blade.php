@extends('layout')
@section('title','Respuesta payU')

@section('content')	
	<div class="panel-group">
		<div class="panel panel-warning" id="panelbienal">
			<div class="panel-heading headingBienal">Resultado Transacción</div>
			<div class="panel-body">
				@if(strtoupper($firma) == strtoupper($firmaCreada))
					<table class='table table-condensed'>
						<tr>
							<td>Estado de la transacción</td>
							<td>{{$estadoTx}}</td>
						</tr>
						<tr>
							<td>ID de la transacción</td>
							<td>{{$infoRespuesta->transactionId}}</td>
						</tr>
						<tr>
							<td>Referencia de la venta</td>
							<td>{{$infoRespuesta->reference_pol}}</td> 
						</tr>
						<tr>
							<td>Referencia de la transacción</td>
							<td>{{$infoRespuesta->referenceCode}}</td>
						</tr>
						@if($infoRespuesta->pseBank != null)
							<tr>
								<td>cus </td>
								<td>{{$infoRespuesta->cus}}</td>
							</tr>
							<tr>
								<td>Banco </td>
								<td>{{$infoRespuesta->pseBank}}</td>
							</tr>
						@endif
						<tr>
							<td>Valor total</td>
							<td>${{$infoRespuesta->TX_VALUE}}</td>
						</tr>
						<tr>
							<td>Moneda</td>
							<td>{{$infoRespuesta->currency}}</td>
						</tr>
						<tr>
							<td>Descripción</td>
							<td>{{$infoRespuesta->description}}</td>
						</tr>
						<tr>
							<td>Entidad:</td>
							<td>{{$infoRespuesta->lapPaymentMethod}}</td>
						</tr>
					</table>
				@else
					<h1>Error validando firma digital.</h1>
				@endif
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" id="imprimir" class="btn btn-warning botonBienal">
							<i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('#imprimir').click(function(){
			window.print();
		});
	</script>
@endsection