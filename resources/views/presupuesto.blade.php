<div class="row">
	<div class="col-md-7 col-xs-7">
		<h4 v-if="terceroSelected.nombre">[[terceroSelected.nombre]]</h4>
	</div>
	<div class="col-md-4 col-xs-4">
		<h4 v-if="terceroSelected.vtotal">Valor: [[terceroSelected.vtotal]]</h4>
	</div>
</div>
	<hr v-if="terceroSelected.nombre">
	<form @submit.prevent="addRubro" accept-charset="utf-8">
		<div class="row">

			<div class="form-group col-md-3">
				<label for="tercero">Rubro</label>
				<template>
					<div>
						<multiselect
						v-model="valueRubros"
						:options="rubros"
						placeholder="Select one"
						label="crubro"
						track-by="crubro"
						:custom-label="showRubros"
						></multiselect>

					</div>
				</template>
			</div>
			<div class="form-group col-md-2">
				<label for="vrubro">Valor</label>
				<input type="text" class="form-control input-currency" id="vrubro" aria-describedby="vrubro" placeholder="Ingrese el valor"  required>

			</div>

			<button type="submit" class="btn btn-success " style="margin-top:25px ">+</button>

		</div>
	</form>
	<hr>
	<table v-if="presupuesto.rubrosSeleccionados.length!=0" class="table-striped table-bordered text-center" width="100%" cellspacing="0">
		<thead>
			<tr style="background-color: #f2f2f2;" align="center">
				<td><strong>Rubro</strong></td>
				<td><strong>Nombre</strong></td>
				<td><strong>Valor</strong></td>
				<td><strong>Eliminar</strong></td>
			</tr>
		</thead>
		<tbody>
			<template v-for="(rubro,index) in presupuesto.rubrosSeleccionados">
				<tr>
					<td>[[rubro.crubro]]</td>
					<td>[[rubro.nrubro]]</td>
					<td align="right">[[rubro.valor]]</td>
					<td ><button @click.prevent="removeRubro(index)" class="btn btn-danger " >-</button></td>
				</tr>
			</template>
		<tr style="background-color: #f2f2f2;">
			<td colspan="2" v-if="presupuesto.rubrosSeleccionados.length!=0" align="center"><strong>Total</strong></td>
			<td v-if="presupuesto.rubrosSeleccionados.length!=0" align="right">
				<strong> [[presupuesto.sumaRubros]]</strong>
			</td>
			
		</tr>
		</tbody>
	</table>
	<form @submit.prevent="createPresupuesto" accept-charset="utf-8">
		<div class="form-group text-center">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Guardar
				</button>
			</div>
		</div>
	</form>

<!--<table  class="display table-presupuestos" width="100%" cellspacing="0">
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
