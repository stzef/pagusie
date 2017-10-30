
<div >
<form @submit.prevent="addSuminstro" accept-charset="utf-8">
	<div class="row">
		<div class="form-group col-md-5">
			<label for="narticulo">Nombre Y Especificación De Articulos</label>
			<input type="text" class="form-control" id="narticulo" aria-describedby="narticulo" placeholder="Nombre del artículo" v-model="suministros.narticulo" required disabled>
		</div>
		
		<div class="form-group col-md-3">
			<label for="undmedida">UND. Medida</label>
			<div class=form-inline>
				<input type="text" class="form-control" id="undmedida" aria-describedby="undmedida" placeholder="UND. Medida" v-model="suministros.nunidad" required disabled>
				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#searcharticulo"><span class="glyphicon glyphicon-search"></span></button>
				<button @click.prevent="GetUnidades" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addarticulo" ><span class="glyphicon glyphicon-plus"></button>
				</div>
		</div>
	</div>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="cantidad">Cantidad</label>
				<input @blur.prevent="operacionAritmetica(['cantidad','vunita'],'*','vtotalsumi')" type="text" class="form-control" id="cantidad" aria-describedby="cantidad" placeholder="Ingrese Cantidad" v-model="suministros.canti" required>
			</div>
			<div class="form-group col-md-2">
				<label for="vunita">Vr. Unitario</label>
				<input @blur.prevent="operacionAritmetica(['cantidad','vunita'],'*','vtotalsumi')" type="text" class="form-control input-currency" id="vunita" aria-describedby="vunita" placeholder="Ingrese Valor Unitario" required>
			</div>
			<div class="form-group col-md-2">
				<label for="vtotal">Vr. Total</label>
				<input type="text" class="form-control input-currency" id="vtotalsumi" aria-describedby="vtotalsumi" placeholder="Ingrese Valor Total" required>
			</div>
			<div class="form-group col-md-2">
				<button type="submit" class="btn btn-success btn-xs" style="margin-top: 30px;"> <strong>Agregar</strong></button>
			</div>
		</div>
</form>

<hr>
		<!--<table v-if="suministros.suministrosSeleccionados.length!=0" class="table-striped table-bordered text-center" width="100%" cellspacing="0">
			<thead>
				<tr style="background-color: #f2f2f2;" align="center">
					<td><strong>N°</strong></td>
					<td><strong>Nombre Y Especificación De Articulos</strong></td>
					<td><strong>Grupo Inventario</strong></td>
					<td><strong>UND. Medida</strong></td>
					<td><strong>Cantidad</strong></td>
					<td><strong>Vr. Unitario</strong></td>
					<td><strong>Vr. Total</strong></td>
					<td><strong></strong></td>
				</tr>
			</thead>
			<tbody>
				<template v-for="(suministro,index) in suministros.suministrosSeleccionados">
					<tr>
						<td>[[index+1]]</td>
						<td>[[suministro.narticulo]]</td>
						<td>[[suministro.grupo]]</td>
						<td>[[suministro.nunidad]]</td>
						<td>[[suministro.canti]]</td>
						<td align="right">[[suministro.vunita]]</td>
						<td align="right">[[suministro.vtotal]]</td>
						<td >
							<button @click.prevent="removeSuministro(index)" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
							<button @click.prevent="editSuministro(index)" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-edit"></span></button>
						</td>
					</tr>
				</template>
				<tr style="background-color: #f2f2f2;">
					<td colspan="6" v-if="suministros.suministrosSeleccionados.length!=0" align="center"><strong>Total</strong></td>
					<td v-if="suministros.suministrosSeleccionados.length!=0" align="right">
						<strong> [[suministros.sumaSuministros]]</strong>
					</td>

				</tr>
			</tbody>
		</table>-->
		<table-suministros  :sumasuministros="suministros.sumaSuministros" :suministros="suministros.suministrosSeleccionados" v-on:eventsumiremove="removeSuministro" v-on:eventsumiedit="editSuministro" >
		</table-suministros>
<form @submit.prevent="createSuministros" accept-charset="utf-8">

		<div class="form-group text-center" >
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Guardar
				</button>
			</div>
		</div>
</form>

	<div id="searcharticulo" class="modal fade" role="dialog">
		<div class="modal-dialog" style="width: 800px">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Buscar Articulo</h4>
				</div>
				<div class="modal-body">
					<div>
						<vue-good-table
						global-Search-Placeholder="Buscar"
						next-Text="Sig"
						prev-Text="Ant"
						rows-Per-Page-Text="Registros por página"
						of-Text="de"
						:columns="columnsArticulos"
						:rows="articulos"
						:paginate="true"
						:global-search="true"
						style-class="table table-bordered"
						:on-Click="selectArticulo"/>
					</div>
				</div>
				<div class="modal-footer">
					<center><button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button></center>
				</div>
			</div>

		</div>
	</div>

	<div id="addarticulo" class="modal fade" role="dialog">
		<div class="modal-dialog" style="width: 800px">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Agregar Articulo</h4>
				</div>
				<div class="modal-body">
					<form @submit.prevent="addSuminstro" accept-charset="utf-8">
						<div class="row">
							<div class="form-group col-md-5">
								<label for="narticulo">Articulo</label>
								<input type="text" class="form-control" id="narticulo" aria-describedby="narticulo" placeholder="Nombre del artículo" v-model="suministros.narticulo" required>
							</div>
							<div class="form-group col-md-4">
								<label for="nunidad">Unidad</label>
								<template>
									<div>
										<multiselect
										v-model="valueUnidades"
										:options="unidades"
										label="nunidad"
										track-by="nunidad"
										:custom-label="showUnidades"
										></multiselect>
									</div>
								</template>

							</div>
							<div class="form-group  col-md-3">
								<!--<button type="button" class="btn btn-success btn-xs" onclick="window.open('print.html', 'newwindow', 'width=800px,height=500,directories=no,titlebar=no,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,'); return false;"><span class="glyphicon glyphicon-plus"></span></button>-->
								<button type="button" class="btn btn-success btn-xs" style="margin-top: 35px" @click.prevent="suministros.create.show=true"><span class="glyphicon glyphicon-plus"></span></button>
							</div>

							<div class="form-group text-center">
								<div class="col-md-4 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Guardar
									</button>
								</div>
							</div>
						</div>
					</form>
					<div v-if="suministros.create.show==true">
						<hr>
						<h4 class="modal-title">Agregar Unidad</h4>
						<hr>
						<form @submit.prevent="CreateUnidad" accept-charset="utf-8">
							<div class="row">
								<div class="form-group col-md-5">
									<label for="nunidad">Nombre</label>
									<div class=form-inline>
										<input type="text" class="form-control" id="nunidad" aria-describedby="nunidad" placeholder="Nombre de la unidad" v-model="suministros.create.nunidad" required>
										<button type="submit" class="btn btn-primary">
											Guardar
										</button>
									</div>
								</div>
								<div class="alert alert-danger" v-if="suministros.create.message!=undefined">
									<strong>Error!</strong> [[suministros.create.message]].
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<center><button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button></center>
				</div>
			</div>
		</div>
</div>

