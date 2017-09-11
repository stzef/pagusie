@extends('layouts.pdf')
@section('body')
<div class="text-center">
	<strong>CERTIDICADO DE PRECIOS DEL MERCADO</strong>
</div>
<br><br>
<div class="text-center">
	<strong>
	EL RECTOR Y AUXILIAR ADMINISTRATIVO DE LA INSTITUCIÓN <br>
		HACE CONSTAR QUE:
	</strong>
</div>
<br><br><br>
<p>
Que ha efectuado la consulta de los precios de mercado y constatado que los elementos y/o servicios a adquirir y/o compra son:
</p>
<br>
<div class="text-center">
	<strong>
		{{$datos->concepto}}
	</strong>
</div>
<br><br>
<p>
	se encuentra en el rango de los PRECIOS DE REFERENCIA DEL MERCADO, según el "Sistema de Información para la Contratación Estatal - SICE".
</p>
<br><br><br>
<p style="margin-bottom: 220px">
Fecha: &nbsp;&nbsp; <strong>{{$datos->festcomp}}</strong>
<p>
<br><br>
<div class="row">
	<div class="col-xs-6">
		<strong>
			RICARDO ELIAS MORALES RODRIGUEZ <br>
			RECTOR
		</strong>
	</div>
	<div class="col-xs-6">
		<strong>
			JAIME AUGUSTO SALGADO DAZA <br>
			AUXILIAR ADMINISTRATIVO
		</strong>
	</div>
</div>		
@endsection