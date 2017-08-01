@extends('layouts.pdf')

@section('header')
<strong><table style="margin: 0 auto;" WIDTH="500">
	<tr>
		<td colspan="3" align="center">{{$colegio->nombre}}</td>
	</tr>
	<tr>
		<td align="center" WIDTH="250">NIT: {{$colegio->nit}}-{{$colegio->dv}}</td>
		<td align="center" WIDTH="250">{{$colegio->ciudad->nciudad}}</td>
	</tr>
	<tr>
		<td colspan="2" align="center">{{$colegio->direccion}}</td>
	</tr>
</table></strong>
@endsection
@section('body')
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
			<strong>COMPROBANTE DE EGRESO Nº </strong></div>
			<div class="col-sm-1 col-xs-1 text-center"><strong>16</strong></div>
			<div class="col-sm-1 col-xs-1"></div>
			<div class="col-sm-4 col-xs-4"><strong> Fecha: {{$datos->ffactu}} </strong></div>
		</div>
	</div>
	@endsection
