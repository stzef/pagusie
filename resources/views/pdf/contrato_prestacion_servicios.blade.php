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
			<strong>CONTRATO DE PRESTACION DE SERVICIO Nº &nbsp;&nbsp; 16 </strong></div>
			<!--<div class="col-sm-1 col-xs-1 cuadrado text-center"><strong>16</strong></div>-->
		</div>
		<br>
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
						<td  ><strong>{{number_format($tercero->nit)}}</strong></td>
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

				<table border="2" width="101%" >
					<tr>
						<td >1.  Se compromete a prestar servicios consistentes en :<br>

							<div class="text-center"> {{ $datos->concepto }}
							</div>

						</td>
					</tr>
					<tr>
						<td >

							2. Presentar informe de actividades. 3. Las demás que sean necesarias para el cumplimiento del objeto contractual. 4. Cumplir con el pago de aportes al sistema de seguridad social y parafiscal, cuando a ello hubiere lugar.

						</td>
					</tr>
					<tr>
						<td >
							<font size="11px">
								<strong>SEGUNDA: INHABILIDADES E INCOMPATIBILIDADES: EL CONTRATISTA </strong>manifiesta no estar incurso en ninguna causal de inhabilidad e incompatibilidad prevista en la Constitución y/o en la Ley, ni en prohibiciones o restricción alguna, que le impida suscribir el presente contrato. <strong>TERCERA: MULTAS Y CLAUSULA PENAL:</strong> En caso de incumplimiento parcial de las obligaciones, por parte del CONTRATISTA, esta faculta a la Entidad para que se le impongan multas sucesivas equivalentes a 1% del valor total del contrato hasta un monto total del 10% del valor total de la misma, dependiendo de la gravedad del incumplimiento, si éste es total,<strong> EL CONTRATISTA</strong> pagará a la Institución Educativa San Isidro a título de pena la suma equivalente al 20% del valor del contrato atendiendo lo dispuesto en el artículo 17 de la ley 1150 de 2007. <strong>CUARTA: LIQUIDACIÓN: </strong>Terminada la ejecución del contrato de Prestación de Servicios, se procederá a su liquidación en los términos y plazos previstos en el artículo 11 de la Ley 1150 de 2007. <strong>QUINTA: SUPERVISIÓN Y VIGILANCIA:</strong> El control y vigilancia de la ejecución del objeto contratado la realizará el Rector de la Institución Educativa o quien este delegue mediante resolución. <strong>SEXTA: PERFECCIONAMIENTO Y REQUISITOS DE EJECUCIÓN: </strong>EL presente contrato, se perfecciona con el acuerdo de voluntades que se da con la firma del presente escrito que lo contiene.
							</font>
						</td>
					</tr>
				</table>
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
		<br><br><br><br>
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
