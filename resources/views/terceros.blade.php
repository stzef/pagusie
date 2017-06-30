@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Terceros
				</div>
			</div>
		</div>
	</div>
	<form>
		<div class="row">
			<div class="form-group col-md-3 col-lg-3">
				<label for="nit" class="form-label">NIT o cedula</label>
				<input type="text" class="form-control" id="nit" aria-describedby="nit" placeholder="Ingrese el número de identificación">
			</div>	
			<div class="form-group col-md-6 col-lg-6">
				<label for="nombre" class="form-label">Nombre</label>
				<input type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Ingrese nombre">
			</div>	
			<div class="form-group col-md-3 col-lg-3">
				<label for="telefono" class="form-label">Teléfono</label>
				<input type="text" class="form-control" id="telefono" aria-describedby="telefono" placeholder="Ingrese teléfono">
			</div>	
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-lg-3">
				<label for="departamento" class="form-label">Departamento</label>
				<input type="text" class="form-control" id="departamento" aria-describedby="departamento" placeholder="">
			</div>
			<div class="form-group col-md-3 col-lg-3">
				<label for="municipio" class="form-label">Municipio</label>
				<input type="text" class="form-control" id="municipio" aria-describedby="municipio" placeholder="">
			</div>
			<div class="form-group col-md-6 col-lg-6">
				<label for="direccion" class="form-label">Dirección</label>
				<input type="text" class="form-control" id="direccion" aria-describedby="direccion" placeholder="Ingrese dirección">
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
</div>
@endsection