@extends('layouts.pdf')
@section('body')
<div class="row container">
	<div class="col-xs-12">
		<strong>
		COMPROBANTE DE SALIDA DE ALMACEN Nº &nbsp;&nbsp;&nbsp; 360
		</strong>
	</div>
</div>
<div class="row container">

	<div class="col-xs-12">
		<strong>
		FECHA DE SALIDA: &nbsp;&nbsp;{{$datos->ffactu}}
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

<table border="2" width="100%">
	<thead>
		<tr>
			<th>Nº</th>
		
			<th>NOMBRE Y ESPECIFICACIÓN DE ARTICULO</th>
		
			<th>GRUPO INVENTARIO</th>
		
			<th>UNIDAD MEDIDA</th>
		
			<th>CANTIDAD</th>
		
			<th>VALOR UNITARIO</th>
		
			<th>VALOR TOTAL</th>
		</tr>
	</thead>
	<tbody>
		
		
	</tbody>
	
	<tr>
		<th colspan="6" class="text-center">TOTAL</th>
		<th>suma</th>
	</tr>
	
</table>

<div class="row container">
<br>
	<div class="text-center">
		<strong>Recibí:</strong>
	</div>
<br><br><br><br><br><br><br><br>
	<div class="col-xs-6">
		<strong>JAIME AUGUSTO SALGADO DAZA</strong> <br>
		AUXILIAR ADMINISTRATIVO
	</div>
	<div class="col-xs-6">
		<strong>Nombre:</strong> <br>
		C.C N°: 
	</div>
</div>
@endsection