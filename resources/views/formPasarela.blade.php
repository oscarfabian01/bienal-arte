@extends('layout')

@section('title', 'Registro')

@section('content')

<h1>Espere un momento por favor......</h1>

<form id="form-pasarela" method="post" action="{{$urlAmbiente}}">
  <input name="merchantId"      type="hidden"  value="{{$merchantId}}">
  <input name="accountId"       type="hidden"  value="{{$accountId}}" >
  <input name="description"     type="hidden"  value="{{$description}}"  >
  <input name="referenceCode"   type="hidden"  value="{{$referenceCode}}" >
  <input name="amount"          type="hidden"  value="{{$amount}}"   >
  <input name="tax"             type="hidden"  value="{{$tax}}"  >
  <input name="taxReturnBase"   type="hidden"  value="{{$taxReturnBase}}" >
  <input name="currency"        type="hidden"  value="{{$currency}}" >
  <input name="signature"       type="hidden"  value="{{$signature}}"  >
  <input name="test"            type="hidden"  value="{{$ambiente}}" >
  <input name="buyerEmail"      type="hidden"  value="{{$buyerEmail}}" >
  <input name="buyerFullName"   type="hidden"  value="{{$buyerFullName}}" >
  <input name="telephone"       type="hidden"  value="{{$telephone}}" >
  <input name="mobilePhone"     type="hidden"  value="{{$mobilePhone}}" >
  <input name="officeTelephone" type="hidden"  value="{{$officeTelephone}}" >
  <input name="billingAddress"  type="hidden"  value="{{$billingAddress}}" >
  <input name="shippingAddress" type="hidden"  value="{{$shippingAddress}}" >
  <input name="shippingCountry" type="hidden"  value="{{$shippingCountry}}" >
  <input name="responseUrl"     type="hidden"  value="{{$responseUrl}}" >
  <input name="confirmationUrl" type="hidden"  value="{{$confirmationUrl}}" >
</form>

<script type="text/javascript">

$('#form-pasarela').submit();

</script>

@endsection