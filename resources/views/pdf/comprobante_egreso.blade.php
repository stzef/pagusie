@extends('layouts.pdf')

@section('styles')
<style>
	.verticalText {
		transform: rotate(-90deg);
		-webkit-transform: rotate(-90deg); /* Safari/Chrome */

	}
	td{
		border: 2px solid black;
	}
	.td-without-border{
		border: 0px;
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
						{{$datos->vtotal_letras}}</strong> <br>
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
	
	<div style="width:45%;display:inline-block;height: 15px;margin-top: 10px;" >
		<table border="2">
			<tr>
				<td colspan="2">DATOS DE LA FACTURA</td>
			</tr>
			<tr>
				<td>SUBTOTAL FACTURA </td>
				<td align="center">{{number_format($datos->vsiva,2)}}</td>
			</tr>
			<tr>
				<td>MAS IVA FACTURADO</td>
				<td align="center">{{number_format($datos->viva,2)}}</td>
			</tr>
			<tr>
				<td>TOTAL FACTURA</td>
				<td align="center">{{number_format($datos->vtotal,2)}}</td>
			</tr>
			<tr>
				<td>TOTAL DEDUCCIONES</td>
				<td align="center"><!--{{number_format($datos->viva,2)}} HACE FALTA EN LA DB DEDUCCIONES SUMA DE LAS RETENCIONES--></td>
			</tr>
			<tr>
				<td>NETO A PAGAR</td>
				<td align="center"><!--{{number_format($datos->viva,2)}} HACE FALTA EN LA DB SUMA VTOTAL A PAGAR + VTOTAL FACTURA--></td>
			</tr>
		</table>
	</div>

	<div style="width:55%;display:inline-block;height: 15px;margin-top: 2px;">
		<table border="2">
			@foreach($impuestos as $key=>$impuesto)
			@if($key==0)
			<tr>
				<td>
					{{$impuesto->nimpuesto}}:
				</td>
				<td align="center">
					{{$impuesto->porcentajeImpuesto}}%
				</td>
				<td align="center">
					{{number_format(($impuesto->porcentajeImpuesto/100)*$datos->vtotal,2)}}
				</td>
				<td rowspan="2">TOTAL DEDUCCIONES</td>
			</tr>
			@elseif($key==2)
			<tr>
				<td>
					{{$impuesto->nimpuesto}}:
				</td>
				<td align="center">
					{{$impuesto->porcentajeImpuesto}}%
				</td>
				<td align="center">
					{{number_format(($impuesto->porcentajeImpuesto/100)*$datos->vtotal,2)}}
				</td>
				<td rowspan="{{count($impuestos)-2}}" align="center">total deducciones FALTA
				</td>
			</tr>
			@else
			<tr>
				<td>
					{{$impuesto->nimpuesto}}:
				</td>
				<td align="center">
					{{$impuesto->porcentajeImpuesto}}%
				</td>
				<td align="center">
					{{number_format(($impuesto->porcentajeImpuesto/100)*$datos->vtotal,2)}}
				</td>
			</tr>
			@endif
			@endforeach
		</table>
	</div>
	<br>

	<div style="width:100%;height: 15px;margin-top: 135px;">
		<table WIDTH="100%" border="2" class="text-center">
			<tr>
				<td colspan="5"><strong>IMPUTACIÓN PRESUPUESTAL</strong></td>
			</tr>
			<tr>
				<td>CÓDIGO</td>
				<td width="30%">RUBRO</td>
				<td>FECHA DISPONIBILIDAD</td>
				<td>FECHA DE REGISTRO PRESUPUESTAL</td>
				<td>VALOR</td>
			</tr>
			@foreach($rubros as $key=>$rubro)
			@if($key==0)
			<tr>
				<td>{{$rubro->crubro}}</td>
				<td>{{strtoupper($rubro->presupuesto->nrubro)}}</td>
				<td rowspan="{{count($rubros)}}">{{$datos->fdispo}}</td>
				<td rowspan="{{count($rubros)}}">{{$datos->fregis}}</td>
				<td>{{number_format($rubro->valor,2)}}</td>
			</tr>	
			@else
			<tr>
				<td>{{$rubro->crubro}}</td>
				<td>{{strtoupper($rubro->presupuesto->nrubro)}}</td>
				<td>{{number_format($rubro->valor,2)}}</td>
			</tr>	
			@endif
			@endforeach
			<tr>
				<td colspan="5" align="left">RESPONSABLE DEL REGISTRO <strong>JAIME AUGUSTO SALGADO DAZA</strong></td>
			</tr>
		</table>
	</div>
	<br>
	<div style="width:100%;height: 15px;margin-top: 135px;">
		<table WIDTH="100%" border="2" >
			<tr>
			<td colspan="2" class="text-center"><strong>FORMA DE PAGO</strong></td>
			</tr>
			<tr>
				<td><strong>BANCO:</strong> </td>
				<td><strong>N° DE CHEQUE:</strong> </td>
			</tr>
			<tr>
				<td><strong>N° DE CUENTA:</strong> </td>
				<td><strong>FECHA DE CHEQUE: </strong> {{$datos->fpago}}</td>
		</table>
	</div>
	<div style="width:50%;display:inline-block;height: 15px;margin-top: 120px;" >
		<table>
			<tr>
			<td class="td-without-border"><strong>RICARDO ELIAS MORALES RODRIGUEZ</strong></td>
			</tr>
			<tr>
			<td class="td-without-border">ORDENADOR DEL GASTO</td>
			</tr>
		</table>
		<br><br><br>
		<table>
				<tr>
				<td class="td-without-border"><strong>JAIME AUGUSTO SALGADO DAZA</strong></td>
				</tr>
				<tr>
				<td class="td-without-border">AUXILIAR ADMINISTRATIVO </td>
				</tr>
			</table>
	</div>

	<div style="width:50%;display:inline-block;height: 15px;margin-top: 2px;">
		<table border="2" width="100%">
		<tr>
			<td><strong>RECIBÌ CONFORME:</strong> <br><br><br><br><br></td>
		</tr>
		<tr>
		<td><strong>Nombre:</strong></td>
		</tr>
		<tr>
		<td><strong>C.C Nº</strong></td>
		</tr>
		</table>
	</div>
	<div style="width:100%;height: 15px;margin-top: 145px;">
	<table>
	<tr>
		<td>
		Se anexa: Certificado de Disponibilidad, Registro Presupuestal, Estudio Previo, Satisfaccion y la Orden
		</td>
	</tr>
	</table>
</div>

@endsection
