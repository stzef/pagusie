<div class="row">
	<div class="col-md-7 col-xs-7">
		<h4 v-if="terceroSelected.nombre">[[terceroSelected.nombre]]</h4>
	</div>
	<div class="col-md-4 col-xs-4">
		<h4 v-if="terceroSelected.vtotal">Valor: [[terceroSelected.vtotal]]</h4>
	</div>
</div>
<hr v-if="terceroSelected.nombre">
<form @submit.prevent="createCheques" accept-charset="utf-8">
	<div class="row">
		<div class="form-group col-md-12">
			<label for="banco">Banco</label>
			<div class="form-inline">
				<input type="text" class="form-control" id="nbanco" aria-describedby="nbanco" placeholder="Nombre del banco" v-model="banco.nbanco" required  disabled>
				<input  type="text" class="form-control" id="numcuenta" aria-describedby="numcuenta" v-model="banco.numcuenta" required disabled placeholder="Número de cuenta">
				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#searchbanco" @click = "list('table-bancos')"><div class="fa fa-search" aria-hidden="true"></div></button>
				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addbanco" >+</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="cheque">Número de Cheque</label>
			<input type="text" class="form-control" id="ccheque" aria-describedby="ccheque" placeholder="Ingrese Código Cheque" v-model="cheque.numcheque" required >
		</div>
		<div class="form-group col-md-4">
			<label for="cheque">Valor</label>
			<input type="text" class="form-control input-currency" id="vCheque" aria-describedby="vCheque" placeholder="Ingrese el valor"  required >
		</div>
		<div class="form-group col-md-4">
			<label for="concepto">Concepto</label>
			<textarea class="form-control" id="concepto" rows="3" v-model="cheque.concepto" required></textarea>
		</div> 
	</div>

	<hr>
<!--<table v-if="cheque.chequesSeleccionados.length!=0" class="table-striped table-bordered text-center" width="100%" cellspacing="0">
	<thead>
		<tr style="background-color: #f2f2f2;" align="center">
			<td><strong>Nombre</strong></td>
			<td><strong>Cuenta</strong></td>
			<td><strong>Cheque</strong></td>
			<td><strong>Valor</strong></td>
			<td><strong>Concepto</strong></td>
			<td><strong>Eliminar</strong></td>
		</tr>
	</thead>
	<tbody>
		<template v-for="(cheque,index) in cheque.chequesSeleccionados">
			<tr>
				<td>[[cheque.nbanco]]</td>
				<td>[[cheque.numcuenta]]</td>
				<td>[[cheque.ccheque]]</td>
				<td align="right">[[cheque.valor]]</td>
				<td>[[cheque.concepto]]</td>
				<td ><button @click.prevent="removecheque(index)" class="btn btn-danger " >-</button></td>
			</tr>
		</template>
		<tr style="background-color: #f2f2f2;">
			<td colspan="2" v-if="cheque.chequesSeleccionados.length!=0" align="center"><strong>Total</strong></td>
			<td v-if="cheque.chequesSeleccionados.length!=0" align="right">
				<strong> [[cheque.sumaCheques]]</strong>
			</td>

		</tr>
	</tbody>
</table>-->

<div class="form-group text-center">
	<div class="col-md-4 col-md-offset-4">
		<button type="submit" class="btn btn-primary">
			Guardar
		</button>
	</div>
</div>
</form>

<div id="searchbanco" class="modal fade" role="dialog">
	<div class="modal-dialog" style="width: 800px">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Buscar Bancos</h4>
			</div>
			<div class="modal-body">
				<table  class="display table-bancos" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Número de cuenta</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						<template v-for="(banco,index) in bancos">
							<tr>
								<td>[[banco.nbanco]]</td>
								<td>[[banco.numcuenta]]</td>
								<td ><button @click.prevent="selectBanco(index)" class="btn btn-info " data-dismiss="modal">Seleccionar</button></td>
							</tr>
						</template>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<center><button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button></center>
			</div>
		</div>

	</div>
</div>

<div id="addbanco" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Agregar Bancos</h4>
			</div>
			<div class="modal-body">
				<form @submit.prevent="createBanco" accept-charset="utf-8">
					<div class="row">
						<div class="form-group col-md-4 col-md-offset-4">
							<label>Nombre</label>
							<input type="text" class="form-control" id="nbanco" aria-describedby="nbanco" placeholder="Ingrese nombre del banco" v-model="banco.nbanco" required >
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4 col-md-offset-4">
							<label>Número de cuenta</label>
							<input type="text" class="form-control" id="numcuenta" aria-describedby="numcuenta" placeholder="Ingrese nombre del banco" v-model="banco.numcuenta" required >
						</div>
					</div>
						<div class="form-group">
			<div class="col-md-4">
					<button type="submit" class="btn btn-primary">
						Guardar
					</button>
				 	<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar
				 	</button>

			</div>
		</div>
				</form>
			</div>
			<div class="modal-footer">
				
			</div>
		</div>

	</div>
</div>