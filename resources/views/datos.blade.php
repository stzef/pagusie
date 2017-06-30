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

</head>
<body>
	<form>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="vigencia" class="form-label">Vigencia</label>
				<input type="text" class="form-control" id="vigencia" aria-describedby="vigencia" placeholder="Ingrese el año de vigencia">
			</div>
			<div class="form-group col-md-3">
				<label for="cegreso">Codigo comprobante egreso</label>
				<input type="text" class="form-control" id="cegreso" aria-describedby="cegreso" placeholder="Ingrese codigo de egreso">
			</div>

			<div class="form-group col-md-3">
				<label for="fechaPago">Fecha de pago</label>
				<input class="form-control" type="date" value="{{ date('Y-m-d') }}" id="fechaPago">
			</div>

			<div class="form-group col-md-3">
				<label for="tercero">Tercero</label>
				<input type="text" class="form-control" id="tercero" aria-describedby="tercero" placeholder="Ingrese el tipo de documento">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="tidocumento">Tipo de documento</label>
				<input type="text" class="form-control" id="tidocumento" aria-describedby="tidocumento" placeholder="Ingrese el tipo de documento">
			</div>

			<div class="form-group col-md-3">
				<label for="fechaFactura">Fecha de pago</label>
				<input class="form-control" type="date" value="{{ date('Y-m-d') }}" id="fechaFactura">  
			</div>

			<div class="form-group col-md-3">
				<label for="numfactura">Número de factura</label>
				<input type="text" class="form-control" id="numfactura" aria-describedby="numfactura" placeholder="Ingrese el número de factura">
			</div>
		</div>
		<div class="form-group">
			<label for="concepto">Concepto</label>
			<textarea class="form-control" id="concepto" rows="3"></textarea>
		</div>
		<div class="form-group">
			<label for="Justificacion">Justificación</label>
			<textarea class="form-control" id="Justificacion" rows="3"></textarea>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="plazo">Plazo de realización</label>
				<input type="text" class="form-control" id="plazo" aria-describedby="plazo" placeholder="Ingrese el plazo de realización">
			</div>
			<div class="form-group col-md-3">
				<label for="fechaCompras">Fecha estudio comité de compras</label>
				<input class="form-control" type="date" value="{{ date('Y-m-d') }}" id="fechaCompras">  
			</div>
			<div class="form-group col-md-3">
				<label for="fechaDisponibilidad">Fecha disponibilidad</label>
				<input class="form-control" type="date" value="{{ date('Y-m-d') }}" id="fechaDisponibilidad">  
			</div>
			<div class="form-group col-md-3">
				<label for="fechaRegistro">Fecha registro</label>
				<input class="form-control" type="date" value="{{ date('Y-m-d') }}" id="fechaRegistro">  
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="valorSinIva">Valor sin IVA</label>
				<input type="text" class="form-control" id="valorSinIva" aria-describedby="valorSinIva" placeholder="Ingrese el valor sin el IVA">
			</div>
			<div class="form-group col-md-3">
				<label for="valorIva">Valor con IVA</label>
				<input type="text" class="form-control" id="valorIva" aria-describedby="valorIva" placeholder="Ingrese el valor con el IVA">
			</div>
			<div class="form-group col-md-3">
				<label for="valorIva">Valor total</label>
				<input type="text" class="form-control" id="valorTotal" aria-describedby="valorTotal" placeholder="Ingrese el valor total">
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
</body>
</html>