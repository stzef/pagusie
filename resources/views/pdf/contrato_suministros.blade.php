@extends('layouts.pdf')
@section('body')
<div class="row">
	<div class="col-xs-5">
		<strong>
			CONTRATO DE SUMINISTROS Nº &nbsp;&nbsp;&nbsp; 360
		</strong>
	</div>
	<div class="col-xs-5">
		Fecha: &nbsp;&nbsp;
		<strong>
			{{$datos->fregis}}
		</strong>
	</div>
	<div class="col-xs-12">
		
	</div>
</div>
<table WIDTH="100%" border="2">
	<tr>
		<td width="20%"><strong>CIUDAD:</strong></td>
		<td colspan="2"><strong>{{ $tercero->ciudad->nciudad }}</strong></td>
	</tr>
	<tr>
		<td><strong>CONTRATISTA:</strong></td>
		<td colspan="2" ><strong>{{strtoupper($tercero->nombre)}}</strong></td>
	</tr>
	<tr>
		<td><strong>C.C Nº:</strong></td>
		<td colspan="2" ><strong>{{number_format($tercero->nit)}}</strong></td>
	</tr>
	<tr>
		<td><strong>PLAZO:</strong></td>
		<td colspan="2"><strong>{{$datos->plazo}}</strong></td>
	</tr>
	<tr>
		<td ROWSPAN="2"><strong>VALOR CONTRATADO:</strong></td>
		<td colspan="2"><strong>{{number_format($datos->vtotal,2)}}</strong></td>
	</tr>
	<tr>
		<td colspan="2"><strong>{{$datos->vtotal_letras}}</strong></td>
	</tr>
	<tr>
		<td ROWSPAN="{{count($rubros)}}">
			<strong>IMPUTACIÓN PRESUPUESTAL:</strong>
		</td>
		@foreach($rubros as $key=>$rubro)
		@if($key==0)
		<td align="center">
			<strong>{{$rubro->crubro}}</strong>
		</td>
		<td align="center"><strong>{{$rubro->presupuesto->nrubro}}</strong>
		</td>
	</tr>
	@else
	<tr align="center">
		<td >
			<strong>{{$rubro->crubro}}</strong>
		</td>
		<td >
			<strong>{{$rubro->presupuesto->nrubro}}</strong>
		</td>
	</tr>
	@endif
	@endforeach
</table>
<div class="text-center">
	<strong>CONDICIONES DE CONTRATACIÓN:</strong>
</div>
PRIMERA - OBLIGACIONES:&nbsp;&nbsp; 1. Se compromete a suministrar los siguientes elementos:
<table border="2">
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
		<th>suma</th>
	</tr>
	
</table>

<div class="row container">
	<div class="col-xm-12" style="font-size: 10px">
		<u><strong>SEGUNDA: INHABILIDADES E INCOMPATIBILIDADES: EL CONTRATISTA </strong></u>manifiesta no estar incurso en ninguna causal de inhabilidad e incompatibilidad prevista en la Constitución y/o en la Ley, ni en prohibiciones o restricción alguna, que le impida suscribir el presente contrato.
		<u><strong>TERCERA: MULTAS Y CLAUSULA PENAL:</strong> </u>
		En caso de incumplimiento parcial de las obligaciones, por parte del CONTRATISTA, esta faculta a la Entidad para que se le impongan multas sucesivas equivalentes a 1% del valor total del contrato hasta un monto total del 10% del valor total de la misma, dependiendo de la gravedad del incumplimiento, si éste es total,<u><strong> EL CONTRATISTA</strong></u> pagará a la Institución Educativa San Isidro a título de pena la suma equivalente al 20% del valor del contrato atendiendo lo dispuesto en el artículo 17 de la ley 1150 de 2007.
		<u><strong>CUARTA: LIQUIDACIÓN: </strong></u>Terminada la ejecución del contrato de Prestación de Servicios, se procederá a su liquidación en los términos y plazos previstos en el artículo 11 de la Ley 1150 de 2007. 
		<u><strong>QUINTA: SUPERVISIÓN Y VIGILANCIA:</strong></u> El control y vigilancia de la ejecución del objeto contratado la realizará el Rector de la Institución Educativa o quien este delegue mediante resolución.
		<u><strong>SEXTA: PERFECCIONAMIENTO Y REQUISITOS DE EJECUCIÓN: </strong></u>EL presente contrato, se perfecciona con el acuerdo de voluntades que se da con la firma del presente escrito que lo contiene.
	</div>
	<br><br><br><br><br><br><br><br>
	<div class="col-xs-6">
		<strong>RICARDO ELIAS MORALES RODRIGUEZ</strong><br>RECTOR
	</div>
	<div class="col-xs-6">
		<strong>{{strtoupper($tercero->nombre)}}</strong> <br>
		C.C Nº: {{number_format($tercero->nit)}}
	</div>
</div>
@endsection