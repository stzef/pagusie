<table v-if="presupuesto.rubrosSeleccionados.length!=0" class="table-striped table-bordered text-center" width="100%" cellspacing="0">
		<thead>
			<tr style="background-color: #f2f2f2;" align="center">
				<td><strong>Rubro</strong></td>
				<td><strong>Nombre</strong></td>
				<td><strong>Valor</strong></td>
				<td><strong></strong></td>
			</tr>
		</thead>
		<tbody>
			<template v-for="(rubro,index) in presupuesto.rubrosSeleccionados">
				<tr>
					<td>[[rubro.crubro]]</td>
					<td>[[rubro.nrubro]]</td>
					<td align="right">[[rubro.valor]]</td>
					<td ><button @click.prevent="removeRubro(index)" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></button></td>
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