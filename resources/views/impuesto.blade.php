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
			<label for="vbase">Valor Base</label>
			<input type="text" class="form-control" id="vbase" aria-describedby="vbase" placeholder="Ingrese el valor" v-model="impuesto.vbase" required>
		</div>	
		<div class="form-group col-md-2">
			<label for="porcentaje">Porcentaje</label>
			<input type="text" class="form-control" id="porcentaje" aria-describedby="porcentaje" placeholder="Ingrese porcentaje" v-model="impuesto.porcentaje_Impuesto" required>
		</div>
		<div class="form-group col-md-2">
			<label for="vimpuesto">Valor Impuesto</label>
			<input type="text" class="form-control" id="vimpuesto" aria-describedby="vimpuesto" placeholder="Ingrese el valor" v-model="impuesto.vimpuesto" required>
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
		</tr>
	</thead> 
	<tbody>
		<template v-for="impuesto in impuesto.impuestosSeleccionados">
			<tr>
				<td>[[impuesto.nimpuesto]]</td>
				<td>[[impuesto.vbase]]</td>
				<td>[[impuesto.porcentaje_Impuesto]]</td>
				<td>[[impuesto.vimpuesto]]</td>
				
			</tr>
		</template>

	</tbody>
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
