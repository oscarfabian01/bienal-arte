@extends('layout')
@section('title','Respuesta payU')

@section('content')
	@if(strtoupper($firma) == strtoupper($firmaCreada))
		<h2>Resumen Transacción</h2>
		<table>
			<tr>
				<td>Estado de la transaccion</td>
				<td>{{$estadoTx}}</td>
			</tr>
			<tr>
				<td>ID de la transaccion</td>
				<td>{{$infoRespuesta->transactionId}}</td>
			</tr>
			<tr>
				<td>Referencia de la venta</td>
				<td>{{$infoRespuesta->reference_pol}}</td> 
			</tr>
			<tr>
				<td>Referencia de la transaccion</td>
				<td>{{$infoRespuesta->referenceCode}}</td>
			</tr>
			<tr>
			@if($infoRespuesta->pseBank != null) {
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
@endsection