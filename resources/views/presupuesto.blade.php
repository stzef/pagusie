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

		<div class="form-group col-md-5">
			<label for="rubro">Rubro</label>
				<!--<template>
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
				</template>-->
				<div class="form-inline">
					<input @blur.prevent="searchPresupuesto()" type="text" class="form-control" id="crubro" aria-describedby="crubro" placeholder="Ingrese código del rubro" v-model="presupuesto.crubro" required style="width: 40%">
					<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#searchrubro"><span class="glyphicon glyphicon-search"></span></button>
					<input  type="text" class="form-control" id="nrubro" aria-describedby="nrubro" v-model="presupuesto.nrubro" required style="width: 40%" disabled >
				</div>
			</div>
			<div class="form-group col-md-2">
				<label for="vrubro">Valor</label>
				
				<input type="text" class="form-control input-currency" id="vrubro" aria-describedby="vrubro" placeholder="Ingrese el valor" required >
				
			</div>
			<div class="form-group col-md-2">
				<button type="submit" class="btn btn-success btn-xs" style="margin-top: 30px;"> <strong></strong></button>
			</div>

		</div>
	</form>
	<hr>
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
	<form @submit.prevent="createPresupuesto" accept-charset="utf-8">
		<div class="form-group text-center" v-if="presupuesto.rubrosSeleccionados.length!=0">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					[[textoBoton]]
				</button>
			</div>
		</div>
	</form>

<!--
-->
<div id="searchrubro" class="modal fade" role="dialog">
	<div class="modal-dialog" style="width: 800px">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Buscar Presupuestos</h4>
			</div>
			<div class="modal-body">
			<!--	<table  class="display table-presupuestos" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Rubro</th>
							<th>Nombre</th>
							<th>Valor Presupuestado</th>
							<th>Valor Ejecutado</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						<template v-for="(rubro,index) in rubros">
							<tr>
								<td>[[rubro.crubro]]</td>
								<td>[[rubro.nrubro]]</td>
								<td>[[rubro.vr_rubro_presupuestado]]</td>
								<td>[[rubro.vr_rubro_ejecutado]]</td>
								<td ><button @click.prevent="selectPresupuesto(index)" class="btn btn-info " data-dismiss="modal">Seleccionar</button></td>
							</tr>
						</template>
					</tbody>
				</table>-->
				<div>
					<vue-good-table
					global-Search-Placeholder="Buscar"
					next-Text="Sig"
					prev-Text="Ant"
					rows-Per-Page-Text="Registros por página"
					of-Text="de"
					:columns="columnsPresupuestos"
					:rows="rubros"
					:paginate="true"
					:global-search="true"
					style-class="table table-bordered"
					:on-Click="selectPresupuesto"/>
				</div>
			</div>
			<div class="modal-footer">
				<center><button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button></center>
			</div>
		</div>

	</div>
</div>
