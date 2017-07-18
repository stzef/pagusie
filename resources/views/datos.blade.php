<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'PagusIE') }}</title>

	<!-- Styles -->
	<link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" >
	
	<!--multiselect -->
	<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.0.0/dist/vue-multiselect.min.css">
	
	<link rel="stylesheet" href="{{ URL::asset('pagusie/node_modules/vue-multiselect/dist/vue-multiselect.min.css')}}"></link>

</head>

<body>
	<form @submit.prevent="CreateDatos" accept-charset="utf-8">
		<div class="row">
			<div class="form-group col-md-3">
				<label for="vigencia" class="form-label">Vigencia</label>
				<input type="text" class="form-control" id="vigencia" aria-describedby="vigencia" placeholder="Ingrese el año de vigencia" v-model="datos.vigencia" required>
			</div>
			<div class="form-group col-md-3">
				<label for="cegreso">Codigo comprobante egreso</label>
				<input type="text" class="form-control" id="cegreso" aria-describedby="cegreso" placeholder="Ingrese codigo de egreso" v-model="datos.cegre" required>
			</div>

			<div class="form-group col-md-3">
				<label for="fechaPago">Fecha de pago</label>
				<datepicker bootstrap-styling type="text" class="date" language="es" id="fechaPago" v-model="datos.fpago" format="yyyy-MM-dd" required></datepicker>
			</div>
			<div class="form-group col-md-3">
				<label for="tercero">Tercero</label>
				<template>
					<div>
						<multiselect v-model="value" :options="options" placeholder="Select one" label="nit" track-by="nit" :custom-label="nameWithLang"></multiselect>
					</div>
				</template>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="tidocumento">Tipo de documento</label>
				<select-documento :id="tidocumento" :tidocumento="tidocumento" :datos="datos"></select-documento>
			</div>

			<div class="form-group col-md-3">
				<label for="fechaFactura">Fecha factura</label>
				<datepicker language="es" id="fechaFactura" v-model="datos.ffactu" format="yyyy-MM-dd" required></datepicker> 
			</div>

			<div class="form-group col-md-3">
				<label for="numfactura">Número de factura</label>
				<input type="text" class="form-control" id="numfactura" aria-describedby="numfactura" placeholder="Ingrese el número de factura" v-model="datos.nfactu" required>
			</div>
		</div>
		<div class="form-group">
			<label for="concepto">Concepto</label>
			<textarea class="form-control" id="concepto" rows="3" v-model="datos.concepto" required></textarea>
		</div>
		<div class="form-group">
			<label for="Justificacion">Justificación</label>
			<textarea class="form-control" id="Justificacion" rows="3" v-model="datos.justificacion" required></textarea>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="plazo">Plazo de realización</label>
				<input type="text" class="form-control" id="plazo" aria-describedby="plazo" placeholder="Ingrese el plazo de realización" v-model="datos.plazo" required>
			</div>
			<div class="form-group col-md-3">
				<label for="fechaCompras">Fecha estudio comité de compras</label>
				<datepicker language="es" id="fechaCompras" v-model="datos.festcomp" format="yyyy-MM-dd" required></datepicker>
			</div>
			<div class="form-group col-md-3">
				<label for="fechaDisponibilidad">Fecha disponibilidad</label>
				<datepicker language="es" id="fechaDisponibilidad" v-model="datos.fdispo" format="yyyy-MM-dd" required></datepicker> 
			</div>
			<div class="form-group col-md-3">
				<label for="fechaRegistro">Fecha registro</label>
				<datepicker language="es" id="fechaRegistro" v-model="datos.fregis" format="yyyy-MM-dd" required></datepicker>

			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="valorSinIva">Valor sin IVA</label>
				<input type="text" class="form-control" id="valorSinIva" aria-describedby="valorSinIva" placeholder="Ingrese el valor sin IVA" v-model="datos.vsiva" required>
			</div>
			<div class="form-group col-md-3">
				<label for="valorIva">Valor con IVA</label>
				<input type="text" class="form-control" id="valorIva" aria-describedby="valorIva" placeholder="Ingrese el valor con IVA" v-model="datos.viva" required>
			</div>
			<div class="form-group col-md-3">
				<label for="valorIva">Valor total</label>
				<input type="text" class="form-control" id="valorTotal" aria-describedby="valorTotal" placeholder="Ingrese el valor total" v-model="datos.vtotal" required>
			</div>
		</div>
		<center><div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Guardar
				</button>
			</div>
		</div></center>
	</form> 
	<!-- multiselect -->
	<!--<script src="https://unpkg.com/vue-multiselect@2.0.0"></script>-->
	
</body>
</html>