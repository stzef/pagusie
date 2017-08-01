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
	<div class="text-center"><strong>{{ $tercero->nombre }}<br>NIT: {{ $tercero->nit }}</strong></div><br>
	<div class="row">
		<div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
			<strong>CONTRATO DE PRESTACION DE SERVICIO Nº </strong></div>
			<div class="col-sm-1 col-xs-1 cuadrado text-center"><strong>16</strong></div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<table WIDTH="400" border="2">
					<tr>
						<td WIDTH="110"><strong>FECHA:</strong></td>
						<td  ><strong>{{$datos->fregis}}</strong></td>
					</tr>
					<tr>
						<td><strong>CIUDAD:</strong></td>
						<td><strong>{{ $tercero->ciudad->nciudad }}</strong></td>
					</tr>
					<tr>
						<td><strong>CONTRATISTA:</strong></td>
						<td  ><strong>{{strtoupper($tercero->nombre)}}</strong></td>
					</tr>
					<tr>
						<td><strong>C.C Nº:</strong></td>
						<td  ><strong>{{$tercero->nit}}</strong></td>
					</tr>
					<tr>
						<td><strong>PLAZO:</strong></td>
						<td  ><strong>{{$datos->plazo}}</strong></td>
					</tr>
					<tr>
						<td ROWSPAN="2"><strong>VALOR CONTRATADO:</strong></td>
						<td  ><strong>{{number_format($datos->vsiva,2)}}</strong></td>
					</tr>
					<tr>
						<td  ><strong>{{$letras}}</strong></td>
					</tr>
					<tr>
						<td ROWSPAN="2"><strong>IMPUTACIÓN PRESUPUESTAL:</strong></td>
						<td  ><strong>RUBRO</strong></td>
					</tr>
					<tr>
						<td  ><strong>RUBRO</strong></td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 text-center">
				<strong>CONDICIONES DE CONTRATACIÓN</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<u><strong>PRIMERA: OBLIGACIONES</strong></u>
			</div>
		</div>
		<div class="row">

			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">

			<table border="2" width="100%" >
					<tr>
						<td >1.  Se compromete a prestar servicios consistentes en :<br><div class="text-center"> {{ $datos->concepto }}</div></td>
					</tr>
					<tr>
					<td align="center">{{ $datos->concepto }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	@endsection
