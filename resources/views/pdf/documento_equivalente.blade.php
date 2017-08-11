@extends('layouts.pdf')


@section('styles')
<style>

	hr {
		height: 3px;
		width: 50%;
		background-color: black;
		margin-bottom: 5px;
	}

</style>


@endsection
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


	<table WIDTH="100%" class="text-center" style="margin: 0 auto;">
		<tr>
			<td>DOCUMENTO EQUIVALENTE A LA FACTURA EN ADQUISICIONES EFECTUADAS A PERSONAS NATURALES NO COMERCIANTES O INSCRITAS EN EL REGIMEN SIMPLIFICADO. DECRETO 1001 DE 1997 ABRIL 8 ARTICULO 17</td>
		</tr>
	</table>
	<br><br>

	<div class="row">
		<div class="col-sm-4 col-xs-4 col-md-3 col-lg-3">
			<strong>DOCUMENTO EQUIVALENTE N° </strong></div>
			<div class="col-sm-1 col-xs-1 cuadrado text-center"><strong>16</strong></div>
			<div class="col-sm-1 col-xs-1"></div>
			<div class="col-sm-4 col-xs-4"><strong> Fecha: {{$datos->ffactu}} </strong></div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-sm-4 col-xs-4 col-md-3 col-lg-3">
				<table WIDTH="400">
					<tr>
						<td WIDTH="70">NOMBRE:</td>
						<td  ><strong>{{strtoupper($tercero->nombre)}}</strong></td>
					</tr>
				</table>
				<table WIDTH="180" >
					<tr>
						<td WIDTH="25">NIT:</td>
						<td WIDTH="80" align="center"><strong>{{$tercero->nit}}</strong></td>
						<td WIDTH="25">DV:</td>
						<td WIDTH="25" align="center"><strong>{{$tercero->dv}}</strong></td>
					</tr>
				</table>


				<table WIDTH="400" >
					<tr>
						<td WIDTH="80">DIRECCION:</td>
						<td colspan="2" >{{strtoupper($tercero->direccion)}}</td>
					</tr>
					<tr>
						<td WIDTH="80">TELEFONO:</td>
						<td colspan="2" >{{$tercero->telefono}} </td>
					</tr>
				</table>
			</div></div>
			<br><br>
			<table width="100%" class="text-center" BORDER="2" style="margin: 0 auto;" >
				<tr>
					<th class="text-center">CONCEPTO</th>
				</tr>
				<tr>
					<td>{{$datos->concepto}}</td>
				</tr>
			</table>
			<br><br>
			<table width="100%" BORDER="2" style="margin: 0 auto;"  >
				<tr>
					<th class="text-center" colspan="2">VALOR DE LA OPERACIÓN</th>
				</tr>
				<tr>
					<td align="center" width="100" height="5%">{{number_format($datos->vtotal,2)}}</td>
					<td align="center">{{ $datos->vtotal_letras }} </td>

				</tr>
			</table>
			<br><br>
			<table class="text-center"" width="100%" BORDER="2" style="margin: 0 auto;"  >
				<tr>
					<th class="text-center" >ACEPTACIÓN DEL CONTENIDO DE ESTE DOCUMENTO</th>
				</tr>
			<!--<tr>
			<td>____________________</td>
		</tr>-->
		<tr>
			<td align="center" height="20%" VALIGN="BOTTOM" ><hr>FIRMA DEL VENDEDOR</hr> </td>
		</tr>
	</table>
</div>
@endsection
