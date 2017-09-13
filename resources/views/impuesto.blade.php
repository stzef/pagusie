<div class="row">
	<div class="col-md-7 col-xs-7">
		<h4 v-if="terceroSelected.nombre"> Tercero: [[terceroSelected.nombre]]</h4>
	</div>
	<div class="col-md-4 col-xs-4">
		<h4 v-if="terceroSelected.vtotal">Valor Facturado: [[terceroSelected.vtotal]]</h4>
	</div>
</div>
<hr v-if="terceroSelected.nombre">

<form @submit.prevent="addImpuesto" accept-charset="utf-8">
	<div class="row">

		<div class="form-group col-md-3">
			<label for="tercero">Impuesto</label>
			<template>
				<div>
					<multiselect v-model="valueImpuesto" :options="impuestos" placeholder="Select one" label="nimpuesto" track-by="nimpuesto" :custom-label="showImpuestos"></multiselect>
				</div>
			</template>
		</div>
		<div class="form-group col-md-2">
			<label for="valorBase">Valor Base</label>
			<input @blur.prevent="operacionAritmetica(['valorBase','porcentaje'],'%','valorImpuesto')" type="text" class="form-control input-currency" id="valorBase" aria-describedby="valorBase" placeholder="Ingrese el valor"  required>
		</div>
		<div class="form-group col-md-2">
			<label for="porcentaje">Porcentaje</label>
			<div class="input-group">
				<input @blur.prevent="operacionAritmetica(['valorBase','porcentaje'],'%','valorImpuesto')" type="text" class="form-control text-right" id="porcentaje" aria-describedby="porcentaje" placeholder="Ingrese porcentaje" v-model="impuesto.porcentaje_Impuesto" required>
				<span class="input-group-addon" id="basic-addon2">%</span>
			</div>
		</div>
		<div class="form-group col-md-2">
			<label for="valorImpuesto">Valor Impuesto</label>
			<input type="text" class="form-control input-currency" id="valorImpuesto" aria-describedby="valorImpuesto" placeholder="Ingrese el valor"  required>
		</div>

		<button type="submit" class="btn btn-success " style="margin-top:25px ">+</button>
		
	</div>
</form>
<hr>
<table  class="table" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Valor Base</th>
			<th>Porcentaje</th>
			<th>Valor Impuesto</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<template v-for="(impuesto,index) in impuesto.impuestosSeleccionados">
			<tr>
				<td>[[impuesto.nimpuesto]]</td>
				<td>[[impuesto.vbase]]</td>
				<td>[[impuesto.porcentaje_Impuesto]]%</td>
				<td>[[impuesto.vimpuesto]]</td>
				<td><button @click.prevent="removeImpuesto(index)" class="btn btn-danger " >-</button></td>
			</tr>
		</template>

	</tbody>


	<footer>
		<th colspan="3" v-if="impuesto.impuestosSeleccionados.length!=0">Total</th>
		<th v-if="impuesto.impuestosSeleccionados.length!=0">
			[[impuesto.sumaImpuestos]]
		</th>
	</footer>

</table>
<form @submit.prevent="createImpuesto" accept-charset="utf-8">
	<div class="form-group text-center">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				Guardar
			</button>
		</div>
	</div>
</form>
<!--
<table  class="display table-presupuestos" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Rubro</th>
			<th>Nombre</th>
			<th>Valor Presupuestado</th>
			<th>Valor Ejecutado</th>
		</tr>
	</thead>
	<tbody>
		<template v-for="rubro in rubros">
			<tr>
				<td>[[rubro.crubro]]</td>
				<td>[[rubro.nrubro]]</td>
				<td>[[rubro.vr_rubro_presupuestado]]</td>
				<td>[[rubro.vr_rubro_ejecutado]]</td>
				</tr>
			</template>

	</tbody>
</table>
-->
