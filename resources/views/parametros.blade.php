@extends("layouts.app")

@section("content")
<!-- <h1 class="text-center">Parametros</h1>
<hr>
<h2 class="text-center">Colegio</h2>
<div class="container">
	<div class="row">
		<div class="form-group col-md-12 col-lg-12">
			<label for="departamento" class="form-label">Departamento</label>
			<template>
				<div>
					<multiselect v-model="valueDepartamento" :options="departamentos" placeholder="Seleccione un departamento" label="ndepartamento" track-by="ndepartamento" :custom-label="showDepartamentos" @input="GetCiudades()"></multiselect>
				</div>
			</template>
		</div>
		<div class="form-group col-md-12 col-lg-12">
			<label for="ciudad" class="form-label">Ciudad</label>
			<template>
				<div>
					<multiselect v-model="valueCiudad" :options="ciudades" placeholder="Select one" label="nciudad" track-by="nciudad" :custom-label="showCiudades"></multiselect>
				</div>
			</template>
		</div>
		<div class="form-group col-md-12">
			<label for="direccion" class="form-label">Dirección</label>
			<input type="text" class="form-control" id="direccion" aria-describedby="direccion" placeholder="Ingrese la dirección del colegio" v-model="parametros.colegio.direccion" required>
		</div>
	</div>
	<div class=row>
		<div class="form-group col-md-12">
			<label for="rector" class="form-label">Rector</label>
			<input type="text" class="form-control" id="rector" aria-describedby="rector" placeholder="Ingrese el nombre del rector" v-model="parametros.colegio.nrector" required>
		</div>
		<div class="form-group col-md-12">
			<label for="auxadmin" class="form-label">Aux. Administrativo</label>
			<input type="text" class="form-control" id="auxadmin" aria-describedby="auxadmin" placeholder="Ingrese el nombre del auxiliar administrativo" v-model="parametros.colegio.nauxadmin" required>
		</div>
	</div>
	<div class="col-md-4 col-md-offset-4">
		<center><button type="submit" class="btn btn-primary">
			Guardar
		</button></center>
	</div>
</div>-->

<div class="col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<center><h2>CONFIGURACIÓN</h2></center>
		</div>
		<div class="panel-body">
			<h2 class="text-center">DATOS COLEGIO</h2>
			<hr>
			<form @submit.prevent="saveParams" accept-charset="utf-8">
				<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				<div class="row">
					<div class="form-group col-md-12 col-lg-12">
						<label for="departamento" class="form-label">Departamento</label>
						<template>
							<div>
								<multiselect v-model="valueDepartamento" :options="departamentos" placeholder="Seleccione un departamento" label="ndepartamento" track-by="ndepartamento" :custom-label="showDepartamentos" @input="GetCiudades()"></multiselect>
							</div>
						</template>
					</div>
					<div class="form-group col-md-12 col-lg-12">
						<label for="ciudad" class="form-label">Ciudad</label>
						<template>
							<div>
								<multiselect v-model="valueCiudad" :options="ciudades" placeholder="Select one" label="nciudad" track-by="nciudad" :custom-label="showCiudades"></multiselect>
							</div>
						</template>
					</div>
					<div class="form-group col-md-12">
						<label for="direccion" class="form-label">Dirección</label>
						<input type="text" class="form-control" id="direccion" aria-describedby="direccion" placeholder="Ingrese la dirección del colegio" v-model="parametros.colegio.direccion" required>
					</div>
					<div class="form-group col-md-12">
						<label for="telefono1" class="form-label">Teléfono</label>
						<input type="text" class="form-control" id="telefono1" aria-describedby="telefono1" placeholder="Ingrese el Teléfono del colegio" v-model="parametros.colegio.telefono1" required>
					</div>
					<div class="form-group col-md-12">
						<label for="telefono2" class="form-label">Teléfono</label>
						<input type="text" class="form-control" id="telefono2" aria-describedby="telefono2" placeholder="Ingrese el Teléfono del colegio" v-model="parametros.colegio.telefono2">
					</div>
					<div class="form-group col-md-12 col-lg-12">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Ingrese Email" v-model="parametros.colegio.email">
					</div>
					<div class="form-group col-md-12">
						<label for="rector" class="form-label">Rector</label>
						<input type="text" class="form-control" id="rector" aria-describedby="rector" placeholder="Ingrese el nombre del rector" v-model="parametros.colegio.nrector" required>
					</div>
					<div class="form-group col-md-12">
						<label for="auxadmin" class="form-label">Aux. Administrativo</label>
						<input type="text" class="form-control" id="auxadmin" aria-describedby="auxadmin" placeholder="Ingrese el nombre del auxiliar administrativo" v-model="parametros.colegio.nauxadmin" required>
					</div>
				</div>
				<h2 class="text-center">EXTRAS</h2>
				<hr>
				<div class=row>
					<template v-for="param in parametros.extras">
						<div class="form-group col-md-12">
							<label class="label-form">[[param.name]]</label>
							<textarea type="text" class="form-control col-md-6" :name="[[param.id]]" :value="[[param.value_text]]" :rows="[[param.row]]"></textarea>
						</div>
					</template>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<center><button type="submit" class="btn btn-primary">
						Guardar
					</button></center>
				</div>
			</form>
		</div>
	</div>
</div>    

@endsection