@extends('layouts.pdf')
@section('styles')
	<style>
	.hrdoble {
	border: 2px solid black; height: 2px;
	}
	</style>
@endsection
@section('body')
<div class="row">
	<div class="col-sm-6 col-xs-offset-3">
		<strong> REGISTRO PRESUPUESTAL Nº &nbsp;&nbsp; {{ $reporte->id }}</strong>
	</div>
</div>
<br><br>
Fecha: &nbsp;<strong> {{ $datos->regis }}</strong>
<br><br>
Señor(a):<br>
<strong>JAIME AUGUSTO SALGADO DAZA</strong> <br>
AUXILIAR ADMINISTRATIVO
<br><br>
Sirvase dar registro(s) presupuestal(es) con cargo al (los) rubro(s): 
<table border="2" width="100%">
	<tr>
		<td width="15%" class="text-center">
			<strong>CODIGO</strong>
		</td>
		<td width="60%" class="text-center">
			<strong>RUBROS</strong>
		</td>
		<td width="20%" class="text-center">
			<strong>VALOR</strong>
		</td>
	</tr>
	@foreach($rubros as $rubro)
	<tr>
		<td width="15%" class="text-center">
			{{ $rubro->crubro }}
		</td>
		<td width="60%" class="text-center">
			{{ $rubro->presupuesto->nrubro }}
		</td>
		<td width="20%" class="text-center">
			{{number_format($rubro->valor,2) }}
		</td>
	</tr>
	@endforeach
</table>
A nombre de: &nbsp; {{strtoupper($tercero->nombre)}}
<table border="2" width="100%">
	<tr>
		<td width="10%">
		POR CONCEPTO:
		</td>
		<td width="90%" align="justify">
			{{$datos->concepto}}
		</td>
	</tr>
</table>
<br><br><br>
<div class="text-center">
	<strong>
			RICARDO ELIAS MORALES RODRIGUEZ<br>
			RECTOR
	</strong>
</div>
<br>
<div class="hrdoble"></div><br><br>
Fecha: &nbsp;<strong> {{ $datos->fregis }}</strong>
<br><br>
<div class="text-center">
	<strong>
		EL AUXILIAR ADMINISTRATIVO DE LA INSTITUCIÓN EDUCATIVA<br>
			HACE CONSTAR QUE:
	</strong>
</div>
<br>
Existe disponibilidad presupuestal en el (los) Rubro(s)<br><br>

<br>
Con cargo al presupuesto de la vigencia &nbsp; <strong>{{$datos->vigencia}}</strong>
<br><br><br><br>
<div class="text-center">
	<strong>
	JAIME AUGUSTO SALGADO DAZA<br>
	AUXILIAR ADMINISTRATIVO
	</strong>
</div>			
@endsection