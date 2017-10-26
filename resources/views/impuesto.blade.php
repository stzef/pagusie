<div class="row">
	<div class="col-md-7 col-xs-7">
		<h4 v-if="terceroSelected.nombre">  [[terceroSelected.nombre]]</h4>
	</div>
	<div class="col-md-4 col-xs-4">
		<h4 v-if="terceroSelected.vtotal">Valor: [[terceroSelected.vtotal]]</h4>
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
			<input @blur.prevent="operacionAritmetica(['valorBase','porcentaje'],'%','valorImpuesto')" type="text" class="form-control input-currency" id="valorBase" aria-describedby="valorBase" placeholder="Ingrese el valor" required >
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

		<button type="submit" class="btn btn-success btn-xs" style="margin-top:30px "> <strong>Agregar</strong></button>
		
	</div>
</form>
<hr>
<table v-if="impuesto.impuestosSeleccionados.length!=0" class="table-striped table-bordered text-center" width="100%" cellspacing="0">
	<thead>
		<tr style="background-color: #f2f2f2;" align="center">
			<td><strong>Nombre</strong></td>
			<td><strong>Valor Base</strong></td>
			<td><strong>Porcentaje</strong></td>
			<td><strong>Valor Impuesto</strong></td>
			<td><strong></strong></td>
		</tr>
	</thead>
	<tbody>
		<template v-for="(impuesto,index) in impuesto.impuestosSeleccionados">
			<tr>
				<td>[[impuesto.nimpuesto]]</td>
				<td align="right">[[impuesto.vbase]]</td>
				<td>[[impuesto.porcentaje_Impuesto]]%</td>
				<td align="right">[[impuesto.vimpuesto]]</td>
				<td>
					<button @click.prevent="removeImpuesto(index)" class="btn btn-danger " > <span class="glyphicon glyphicon-remove"></span></button></td>
			</tr>
		</template>
		<tr style="background-color: #f2f2f2;">
			<td colspan="3" v-if="impuesto.impuestosSeleccionados.length!=0" align="center" ><strong>Total Descuento</strong></td>
			<td v-if="impuesto.impuestosSeleccionados.length!=0" align="right">
				<strong>[[impuesto.sumaImpuestos]]</strong>
			</td>
		</tr>
		<tr style="background-color: #f2f2f2;">
			<td colspan="3" v-if="impuesto.impuestosSeleccionados.length!=0" align="center" ><strong>Valor A Pagar</strong></td>
			<td v-if="impuesto.impuestosSeleccionados.length!=0" align="right">
				<strong>[[impuesto.netopagar]]</strong>
			</td>
		</tr>

	</tbody>

</table>
<form @submit.prevent="createImpuesto" accept-charset="utf-8">
	<div class="form-group text-center" v-if="impuesto.impuestosSeleccionados.length!=0">
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
