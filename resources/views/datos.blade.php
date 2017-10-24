<form @submit.prevent="CreateDatos" accept-charset="utf-8">
	<div class="row">
		<div class="form-group col-md-3">
			<label for="vigencia" class="form-label">Vigencia</label>
			<input type="text" class="form-control" id="vigencia" aria-describedby="vigencia" placeholder="Ingrese el año de vigencia" v-model="datos.vigencia" required @blur.prevent="GetConvocatorias()">
		</div>
<!--		<div class="form-group col-md-3">
			<label for="cegreso">Codigo comprobante egreso</label>
			<input @blur.prevent="existsComprobanteEgreso()" type="text" class="form-control" id="cegreso" aria-describedby="cegreso" placeholder="Ingrese codigo de egreso" v-model="datos.cegre" required>
		</div>-->
		<div class="form-group col-md-3">
			<label for="fechaPago">Fecha de pago</label>
			<datepicker calendar-button calendar-button-icon="fa fa-calendar" disabled-picker bootstrap-styling language="es" id="fechaPago" v-model="datos.fpago" format="yyyy-MM-dd" required></datepicker>
		</div>
		<div class="form-group col-md-6">
			<label for="tercero">Tercero</label>
			<div class=form-inline>
				<input @blur.prevent="searchTercero()" type="text" class="form-control" id="nittercero" aria-describedby="nittercero" placeholder="Ingrese el número del nit" v-model="terceros.nit" required style="width: 35%">
				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#searchtercero"><span class="glyphicon glyphicon-search"></span></button>
				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addtercero" ><span class="glyphicon glyphicon-plus"></button>
					<input  type="text" class="form-control" id="nombretercero" aria-describedby="nombretercero" v-model="terceros.nombre" required style="width: 50%" disabled >
				</div>
				<!--<template>
						<multiselect v-model="valueTercero" :options="tercero" placeholder="Select one" label="nit" track-by="nit" :custom-label="showTerceros" ></multiselect>
					</template>-->
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-3">
					<label for="tidocumento">Tipo de documento</label>
					<!--<select-documento :id="tidocumento" :tidocumento="tidocumento" :datos="datos"></select-documento>-->
					<template>
						<div>
							<multiselect v-model="valueTdocu" :options="tidocumento" placeholder="Select one" label="ntidocumento" track-by="ntidocumento" :custom-label="showTidocumento"></multiselect>
						</div>
					</template>
				</div>

				<div class="form-group col-md-3">
					<label for="fechaFactura">Fecha factura</label>
					<datepicker calendar-button calendar-button-icon="fa fa-calendar" disabled-picker bootstrap-styling language="es" id="fechaFactura" v-model="datos.ffactu" format="yyyy-MM-dd" required></datepicker>
				</div>

				<div class="form-group col-md-3">
					<label for="numfactura">Número de factura</label>
					<input type="text" class="form-control" id="numfactura" aria-describedby="numfactura" placeholder="Ingrese el número de factura" v-model="datos.nfactu" required>
				</div>
				<div class="form-group col-md-3">

					<label for="convocatoria"> Convocatoria Nº</label>
					<div class=form-inline>
						<input type="text" class="form-control" id="convocatoria" aria-describedby="convocatoria" v-model="datos.convocatoria">
						<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#searchconvocatoria"><span class="glyphicon glyphicon-search"></span></button>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="form-group col-md-12">
					<label for="concepto">Concepto</label>
					<textarea class="form-control" id="concepto" rows="3" v-model="datos.concepto" required></textarea>
				</div>
				<div class="form-group col-md-12">
					<label for="Justificacion">Justificación</label>
					<textarea class="form-control" id="Justificacion" rows="3" v-model="datos.justificacion" required></textarea>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-3">
					<label for="plazo">Plazo de realización</label>
					<input type="text" class="form-control" id="plazo" aria-describedby="plazo" placeholder="Ingrese el plazo de realización" v-model="datos.plazo" required>
				</div>
				<div class="form-group col-md-3">
					<label for="fechaCompras">Fecha estudio comité de compras</label>
					<datepicker calendar-button calendar-button-icon="fa fa-calendar" disabled-picker bootstrap-styling language="es" id="fechaCompras" v-model="datos.festcomp" format="yyyy-MM-dd" required></datepicker>
				</div>
				<div class="form-group col-md-3">
					<label for="fechaDisponibilidad">Fecha disponibilidad</label>
					<datepicker calendar-button calendar-button-icon="fa fa-calendar" disabled-picker bootstrap-styling language="es" id="fechaDisponibilidad" v-model="datos.fdispo" format="yyyy-MM-dd" required></datepicker>
				</div>
				<div class="form-group col-md-3">
					<label for="fechaRegistro">Fecha registro</label>
					<datepicker calendar-button calendar-button-icon="fa fa-calendar" disabled-picker bootstrap-styling language="es" id="fechaRegistro" v-model="datos.fregis" format="yyyy-MM-dd" required></datepicker>

				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-3">
					<label for="valorSinIva">Vr. Antes IVA</label>
					<input @blur.prevent="operacionAritmetica(['valorSinIva','valorIva'],'+','valorTotal')" type="text" class="form-control input-currency" id="valorSinIva" aria-describedby="valorSinIva" placeholder="Ingrese el valor sin IVA"  required>
				</div>
				<div class="form-group col-md-3">
					<label for="valorIva">Vr. IVA</label>
					<input @blur.prevent="operacionAritmetica(['valorSinIva','valorIva'],'+','valorTotal')" type="text" class="form-control input-currency" id="valorIva" aria-describedby="valorIva" placeholder="Ingrese el valor con IVA"  required>
				</div>
				<div class="form-group col-md-3">
					<label for=" valorTotal">Vr. Total</label>
					<input type="text" class="form-control input-currency" id="valorTotal" aria-describedby="valorTotal" placeholder="Ingrese el valor total"  required>
				</div>
			</div>
			<div class="form-group text-center">
				<div class="col-md-4 col-md-offset-4">
					<button type="submit" class="btn btn-primary">
						[[textoBoton]]
					</button>
				</div>
			</div>
		</form>
		<!--Start modal-->
		<div id="addtercero" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width: 600px">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Terceros</h4>
					</div>
					<div class="modal-body">
						@include('terceros')
					</div>
					<div class="modal-footer">
						<!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
					</div>
				</div>

			</div>
		</div>
		<div id="searchconvocatoria" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width: 800px">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Seleccionar Convocatoria</h4>
					</div>
					<div class="modal-body">
						<div>
							<vue-good-table
							global-Search-Placeholder="Buscar"
							next-Text="Sig"
							prev-Text="Ant"
							rows-Per-Page-Text="Registros por página"
							of-Text="de"
							:columns="columnsConvocatoria"
							:rows="convocatorias"
							:paginate="true"
							:global-search="true"
							style-class="table table-bordered"
							:on-Click="selectConvocatoria"/>
						</div>
					</div>
					<div class="modal-footer">
						<center><button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button></center>
					</div>
				</div>

			</div>
		</div>
		<div id="searchtercero" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width: 800px">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Buscar Terceros</h4>
					</div>
					<div class="modal-body">
					<!--	<table  class="display table-terceros" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Nit</th>
									<th>Nombre</th>
									<th>Teléfono</th>
									<th>E-Mail</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<template v-for="(terceros,index) in this.tercero">
									<tr>
										<td>[[terceros.nit]]-[[terceros.dv]]</td>
										<td>[[terceros.nombre]]</td>
										<td>[[terceros.telefono]]</td>
										<td>[[terceros.email]]</td>
										<td ><button @click.prevent="selectTercero(index)" class="btn btn-info " data-dismiss="modal">Seleccionar</button></td>

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
							:columns="columnsTerceros"
							:rows="tercero"
							:paginate="true"
							:global-search="true"
							style-class="table table-bordered"
							:on-Click="selectTercero"/>
						</div>
					</div>
					<div class="modal-footer">
						<center><button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button></center>
					</div>
				</div>

			</div>
		</div>
<!--end modal-->