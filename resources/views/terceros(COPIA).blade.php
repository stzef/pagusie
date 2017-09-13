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
	<form @submit.prevent="CreateTercero" accept-charset="utf-8" >
		<input type="hidden" name="_token" id="token"  value="{{csrf_token()}}"></input>
		<div class="row">
			<div class="form-group col-md-4 col-lg-4">
				<label for="nit" class="form-label">NIT o cedula</label>
				<div class="form-inline">
					<input type="text" class="form-control" id="nit" aria-describedby="nit" placeholder="Ingrese el número de identificación" v-model="terceros.nit" size="26" @blur="setDv(calcularDigitoVerificacion($event.target.value))" required>
					<div class="input-group mb-1 mr-sm-1 mb-sm-0">
						<div class="input-group-addon">-DV</div>
						<input v-model="terceros.dv" name="dv" class="form-control" id="dv" size="1" maxlength="1" disabled="true" type="text">
					</div>
				</div>
			</div>
			<div class="form-group col-md-5 col-lg-5">
				<label for="nombre" class="form-label">Nombre</label>
				<input type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Ingrese nombre" v-model="terceros.nombre" required>
			</div>
			<div class="form-group col-md-3 col-lg-3">
				<label for="telefono" class="form-label">Teléfono</label>
				<input type="text" class="form-control" id="telefono" aria-describedby="telefono" placeholder="Ingrese teléfono" v-model="terceros.telefono" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-lg-3">
				<label for="departamento" class="form-label">Departamento</label>
				<!--<select v-model="terceros.cdepar" name="departamento" id="departamento" class="form-control input-sm" @change="GetCiudades($event.target.value)" >
					<template v-for="departa in departamentos">
						<option :value="departa.cdepar"> [[ departa.ndepartamento ]]</option>
					</template>
				</select>-->
				<template>
					<div>
						<multiselect v-model="valueDepartamento" :options="departamentos" placeholder="Seleccione un departamento" label="ndepartamento" track-by="ndepartamento" :custom-label="showDepartamentos" @input="GetCiudades()"></multiselect>
					</div>
				</template>

			</div>
			<div class="form-group col-md-3 col-lg-3">
				<label for="ciudad" class="form-label">Ciudad</label>
				<!--<select v-model="terceros.cciud" name="ciudad" id="ciudad" class="form-control input-sm">
					<template v-for="obj in ciudades">
						<option :value="obj.cciud"> [[obj.nciudad]] </option>
					</template>
				</select>-->
				<template>
					<div>
						<multiselect v-model="valueCiudad" :options="ciudades" placeholder="Select one" label="nciudad" track-by="nciudad" :custom-label="showCiudades"></multiselect>
					</div>
				</template>

			</div>
			<div class="form-group col-md-3 col-lg-3">
				<label for="direccion" class="form-label">Dirección</label>
				<input type="text" class="form-control" id="direccion" aria-describedby="direccion" placeholder="Ingrese dirección" v-model="terceros.direccion" required>
			</div>
			<div class="form-group col-md-3 col-lg-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Ingrese Email" v-model="terceros.email" required>
			</div>

		</div>
		<center><div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<center><button type="submit" class="btn btn-primary">
					Guardar
				</button></center>
			</div>
		</div></center>
	</form>
</div>
@endsection
