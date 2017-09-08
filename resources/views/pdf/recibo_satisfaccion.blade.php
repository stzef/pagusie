@extends('layouts.pdf')
@section('body')
<div class="row">
	<div class="col-xs-12 text-center">
		<strong>EL RECTOR DE LA INSTITUCIÓN<br> HACE CONSTAR QUE:</strong>
	</div>
</div>
<br><br><br><br><br><br><br>
<div class="row">
	<div class="col-xs-12 ">
		Recibió satisfacción el servicio o el bien prestado o sumisrado por:
	</div>
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<strong>{{strtoupper( $tercero->nombre )}}</strong>
	</div>
</div>
<div class="row">
	<div class="col-xs-2 col-sm-2">
		<strong>NIT: </strong> &nbsp;&nbsp;&nbsp;&nbsp;{{ $tercero->nit }}
	</div>
	<div class="col-xs-1 col-sm-1">
		<strong>DV: </strong>&nbsp;&nbsp;{{ $tercero->dv }}
	</div>
</div>
<br><br>
<div class="row">
	<div class="col-ms-12 col-xs-12">
	Consistente en:
	</div>
</div>
<div class="row">
	<div class="col-ms-12 col-xs-12 text-center">
		<strong>{{ $datos->concepto }}</strong>
	</div>
</div>
<br><br>
<div class="row">
	<div class="col-ms-12 col-xs-12">
		Durante el tiempo:
	</div>
</div>
<div class="row">
	<div class="col-ms-12 col-xs-12">
		<strong>{{ $datos->plazo }}</strong>
	</div>
</div>
<br><br>
<div class="row">
	<div class="col-ms-12 col-xs-12">
		Se expide para legalización y tramite de su respectivo pago.
	</div>
</div>
<br><br><br>
<div class="row">
	<div class="col-ms-12 col-xs-12">
		FECHA: &nbsp;&nbsp;<strong>{{ $datos->fpago }}</strong>
	</div>
</div>
<br><br><br><br>
<div class="row" style="margin-top: 140px">
	<div class="col-ms-12 col-xs-12 text-center">
		<strong>RICARDO ELIAS MORALES RODRIGUEZ<br>RECTOR</strong>
	</div>
</div>

@endsection