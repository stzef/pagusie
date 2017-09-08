@extends('layouts.pdf')
@section('styles')
	<style>
	hr {
	border: 2px solid black; height: 2px;
	}
	</style>
@endsection
@section('body')
<div class="row">
	<div class="col-sm-6 col-xs-offset-3">
		<strong> DISPONOBILIDAD PRESUPUESTAL Nº &nbsp;&nbsp; {{ $reporte->id }}</strong>
	</div>
</div>
<br><br><br>
Fecha: &nbsp;<strong> {{ $datos->fdispo }}</strong>
<br><br><br>
Señor(a):<br>
<strong>JAIME AUGUSTO SALGADO DAZA</strong> <br>
AUXILIAR ADMINISTRATIVO
<br><br><br>
Sirvase dar disponobilidad presupuestal por el (los) rubro(s): <br><br>
<table border="2" width="100%">
	<tr>
		<td width="15%" class="text-center">
			<strong>CODIGO</strong>
		</td>
		<td width="60%" class="text-center">
			<strong>RUBROS</strong>
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
	</tr>
	@endforeach
</table>
<br><br><br>
Del presupuesto de la vigencia: &nbsp; {{ $datos->vigencia }}
<br><br><br><br>
<div class="text-center">
	<strong>
			RICARDO ELIAS MORALES RODRIGUEZ<br>
			RECTOR
	</strong>
</div>
<br>
<hr>
Fecha: &nbsp;<strong> {{ $datos->fdispo }}</strong>
<br><br><br>
<div class="text-center">
	<strong>
		EL AUXILIAR ADMINISTRATIVO DE LA INSTITUCIÓN EDUCATIVA<br>
			HACE CONSTAR QUE:
	</strong>
</div>
<br><br>
Existe disponibilidad presupuestal en el (los) Rubro(s)<br><br>
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

@endsection