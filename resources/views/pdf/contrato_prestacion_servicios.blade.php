@extends('layouts.pdf')

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
	<div class="text-center"><strong>{{ $tercero->nombre }}<br>NIT: {{ $tercero->nit }}</strong></div><br>
	<div class="row">
		<div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
			<strong>CONTRATO DE PRESTACION DE SERVICIO Nº &nbsp;&nbsp; {{$reporte->id}} </strong></div>
			<!--<div class="col-sm-1 col-xs-1 cuadrado text-center"><strong>16</strong></div>-->
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<table WIDTH="80%" border="2">
					<tr>
						<td WIDTH="110"><strong>FECHA:</strong></td>
						<td colspan="2"><strong>{{$datos->fregis}}</strong></td>
					</tr>
					<tr>
						<td><strong>CIUDAD:</strong></td>
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
						<td colspan="2"><strong>{{number_format($datos->vsiva,2)}}</strong></td>
					</tr>
					<tr>
						<td colspan="2"><strong>{{$datos->vsiva_letras}}</strong></td>
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
				<p style="font-size: 10px" >
					<u><strong>PRIMERA: OBLIGACIONES</strong></u>
				</p>
				<p style="font-size: 10px" >
					1.  Se compromete a prestar servicios consistentes en :
				</p>
				<p style="font-size: 10px"  class="text-center">
					{{ $datos->concepto }}
				</p>
				<p style="font-size: 10px" >
					2. Presentar informe de actividades. 3. Las demás que sean necesarias para el cumplimiento del objeto contractual. 4. Cumplir con el pago de aportes al sistema de seguridad social y parafiscal, cuando a ello hubiere lugar.
				</p>
				<p style="font-size: 10px" >
					<u><strong>SEGUNDA: INHABILIDADES E INCOMPATIBILIDADES: EL CONTRATISTA </strong></u>manifiesta no estar incurso en ninguna causal de inhabilidad e incompatibilidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; prevista en la Constitución y/o en la Ley, ni en prohibiciones o restricción alguna, que le impida suscribir el presente contrato.
				</p>
				<p style="font-size: 10px" >
					<u><strong>TERCERA: MULTAS Y CLAUSULA PENAL:</strong> </u>
					En caso de incumplimiento parcial de las obligaciones, por parte del CONTRATISTA, esta faculta a la Entidad para &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;que se le impongan multas sucesivas equivalentes a 1% del valor total del contrato hasta un monto total del 10% del valor total de la misma, dependiendo de la &nbsp;&nbsp;&nbsp;&nbsp; gravedad del incumplimiento, si éste es total,<u><strong> EL CONTRATISTA</strong></u> pagará a la Institución Educativa San Isidro a título de pena la suma equivalente al 20% del valor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; del contrato atendiendo lo dispuesto en el artículo 17 de la ley 1150 de 2007.
				</p>
				<p style="font-size: 10px" >
					<u><strong>CUARTA: LIQUIDACIÓN: </strong></u>Terminada la ejecución del contrato de Prestación de Servicios, se procederá a su liquidación en los términos y plazos previstos en el &nbsp;&nbsp;artículo 11 de la Ley 1150 de 2007. 
				</p>
				<p style="font-size: 10px" >
					<u><strong>QUINTA: SUPERVISIÓN Y VIGILANCIA:</strong></u> El control y vigilancia de la ejecución del objeto contratado la realizará el Rector de la Institución Educativa o quien este delegue mediante resolución.
				</p>
				<p style="font-size: 10px" >
					<u><strong>SEXTA: PERFECCIONAMIENTO Y REQUISITOS DE EJECUCIÓN: </strong></u>EL presente contrato, se perfecciona con el acuerdo de voluntades que se da con la firma del presente escrito que lo contiene.
				</p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-6">
				LA INSTITUCIÓN EDUCATIVA
			</div>
			<div class="col-xs-6">
				EL CONTRATISTA
			</div>
		</div>
		<br><br><br>
		<div class="row">
			<div class="col-xs-6">
				<strong>RICARDO ELIAS MORALES RODRIGUEZ</strong>
			</div>
			<div class="col-xs-6">
				<strong>{{strtoupper($tercero->nombre)}}</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				RECTOR
			</div>
			<div class="col-xs-6">
				C.C Nº: {{number_format($tercero->nit)}}
			</div>
		</div>
	</div>
	@endsection
