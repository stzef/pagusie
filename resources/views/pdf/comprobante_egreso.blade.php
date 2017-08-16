@extends('layouts.pdf')

@section('styles')
<style>
	.verticalText {
		transform: rotate(-90deg);
		-webkit-transform: rotate(-90deg); /* Safari/Chrome */

	}
</style>
@endsection
@section('header')
<!--<strong><table style="margin: 0 auto;" WIDTH="500">
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
</table></strong>-->
@endsection
@section('body')
<div class="container">
	<div class="row">
		<div class="col-sm-5 col-xs-5 col-md-5 col-lg-5">
			<strong>COMPROBANTE DE EGRESO Nº &nbsp;&nbsp; 16 </strong>
		</div>

		<!--<div class="col-sm-1 col-xs-1 text-center"><strong>16</strong></div>-->

		<div class="col-sm-1 col-xs-1 "></div>

		<div class="col-sm-4 col-xs-4"><strong> Fecha: {{$datos->fpago}} </strong></div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<table WIDTH="100%" border="2">
				<tr >
					<td colspan="2">DEBE A : &nbsp;&nbsp;<strong>{{strtoupper($tercero->nombre)}}</strong></td>
				</tr>
				<tr >
					<td colspan="2">IDENTIFICADO CON NIT Nº &nbsp;&nbsp;  <strong>{{$tercero->nit}} - {{$tercero->dv}}<strong></td>
				</tr>
				<tr >
					<td colspan="2">LA SUMA DE  &nbsp;&nbsp; <strong>$ {{number_format($datos->vtotal,2)}} <br>
						{{$letras['vtotal']}}</strong> <br>
					</td>
				</tr>
				<tr >
					<td width="23%">
						POR CONCEPTO:
					</td>
					<td >{{$datos->concepto}}
					</td>
				</tr>
				<tr>
					<td colspan="2" align="justify"><strong>COMPROBANTE DE EGRESO Nº   07  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$datos->ffactu}}  </strong></td>
				</tr>
			</table>
		</div>
	</div>
	<br>
	<div class="row">
		<div style="width:50%;display:inline-block;">
			<table style=" border:1px solid black;">
				<tr>
					<th colspan="2">DATOS FACTURA</th>
				</tr>
				<tr>
					<td>SUBTOTAL FACTURA </td>
					<td>{{number_format($datos->vsiva,2)}}</td>
				</tr>
				<tr>
					<td>MAS IVA FACTURADO</td>
					<td>{{number_format($datos->viva,2)}}</td>
				</tr>
				<tr>
					<td>TOTAL FACTURA</td>
					<td>{{number_format($datos->vtotal,2)}}</td>
				</tr>
				<tr>
					<td>TOTAL DEDUCCIONES</td>
					<td><!--{{number_format($datos->viva,2)}} HACE FALTA EN LA DB DEDUCCIONES SUMA DE LAS RETENCIONES--></td>
				</tr>
				<tr>
					<td>NETO A PAGAR</td>
					<td><!--{{number_format($datos->viva,2)}} HACE FALTA EN LA DB SUMA VTOTAL A PAGAR + VTOTAL FACTURA--></td>
				</tr>
			</table>
		</div>

		<div style="width:50%;display:inline-block;">
			<table style=" border:1px solid black;">
				<tr>
					<td>Honorarios: <!-- sacar de db-->
					</td>
					<td><!--valor sacar de db--></td>
					<td rowspan="2">TOTAL DEDUCCIONES</td>
				</tr>

			</table>

		</div>
	</div>

</div>

@endsection
