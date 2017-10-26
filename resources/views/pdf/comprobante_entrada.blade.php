@extends('layouts.pdf')
@section('body')
<div class="row container">
	<div class="col-xs-12">
		<strong>
		COMPROBANTE DE ENTRADA DE ALMACEN Nº &nbsp;&nbsp;&nbsp; {{$reporte->id}}
		</strong>
	</div>
</div>
<div class="row container">

	<div class="col-xs-12">
		<strong>
		FECHA DE ENTRADA: &nbsp;&nbsp;{{$datos->ffactu}}
		</strong>
	</div>
</div>
<div class="row container">
	<div class="col-xs-12">
		<strong>
		DEPENDENCIA: &nbsp;&nbsp;ALMACEN
		</strong>
	</div>
</div>
<div class="row container">
	<div class="col-xs-12">
		<strong>
		PROVEEDOR: &nbsp;&nbsp;{{strtoupper($tercero->nombre)}}
		</strong>
	</div>
</div>
<div class="row container">	
	<div class="col-xs-12">
		<strong>
		FACTURA: &nbsp;&nbsp;N° {{$datos->nfactu}}
		</strong>
	</div>
</div>
<div class="row container">
	<div class="col-xs-12">
		<strong>
		FECHA: &nbsp;&nbsp;{{$datos->ffactu}}
		</strong>
	</div>
</div>
<br>

<table border="2">
	<thead>
		<tr>
			<td align="center"><strong>Nº</strong></td>
			<td align="center"><strong>NOMBRE Y ESPECIFICACIÓN DE ARTICULO</strong></td>
			<td align="center"><strong>GRUPO INVENTARIO</strong></td>
			<td align="center"><strong>UNIDAD MEDIDA</strong></td>
			<td align="center"><strong>CANTIDAD</strong></td>
			<td align="center"><strong>VALOR UNITARIO</strong></td>
			<td align="center"><strong>VALOR TOTAL</strong></td>
		</tr>
	</thead>
	<tbody>
		@foreach($suministros as $key=>$suministro)
		<tr>
			<td align="center"> {{$key+1}}</td>
			<td align="center"> {{$suministro->articulo->narticulo}}</td>
			<td align="center"> 0</td>
			<td align="center"> {{$suministro->articulo->unidad->nunidad}}</td>
			<td align="center"> {{$suministro->canti}}</td>
			<td align="right"> $ {{number_format($suministro->vunita,2)}}</td>
			<td align="right"> $ {{number_format($suministro->vtotal,2)}}</td>
		</tr>
		@endforeach
		
	</tbody>
	<tr>
		<th colspan="6" class="text-center">TOTAL</th>
		<td align="right"><strong>$ {{number_format($datos->vtotalsumi,2)}}</strong></td>
	</tr>
</table>

<div class="row container">
<br><br><br><br><br><br><br><br>
	<div class="col-xs-6">
		<strong>RICARDO ELIAS MORALES RODRIGUEZ</strong><br>RECTOR
	</div>
	<div class="col-xs-6">
		<strong>JAIME AUGUSTO SALGADO DAZA</strong> <br>
		AUXILIAR ADMINISTRATIVO
	</div>
</div>
@endsection