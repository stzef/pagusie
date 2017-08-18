<form @submit.prevent="CreateDatos" accept-charset="utf-8">
	<div class="row">
		<div class="form-group col-md-3">
			<label for="vigencia" class="form-label">Vigencia</label>
			<input type="text" class="form-control" id="vigencia" aria-describedby="vigencia" placeholder="Ingrese el año de vigencia" v-model="datos.vigencia" required>
		</div>
		<div class="form-group col-md-3">
			<label for="cegreso">Codigo comprobante egreso</label>
			<input type="text" class="form-control" id="cegreso" aria-describedby="cegreso" placeholder="Ingrese codigo de egreso" v-model="datos.cegre" required>
		</div>
		<div class="form-group col-md-3">
			<label for="fechaPago">Fecha de pago</label>
			<datepicker calendar-button calendar-button-icon="fa fa-calendar" disabled-picker bootstrap-styling language="es" id="fechaPago" v-model="datos.fpago" format="yyyy-MM-dd" required></datepicker>
		</div>
		<div class="form-group col-md-3">
			<label for="tercero">Tercero</label>
			<template>
				<div>
					<multiselect v-model="valueTercero" :options="tercero" placeholder="Select one" label="nit" track-by="nit" :custom-label="showTerceros"></multiselect>
				</div>
			</template>
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
	</div>
	<div class="form-group">
		<label for="concepto">Concepto</label>
		<textarea class="form-control" id="concepto" rows="3" v-model="datos.concepto" required></textarea>
	</div>
	<div class="form-group">
		<label for="Justificacion">Justificación</label>
		<textarea class="form-control" id="Justificacion" rows="3" v-model="datos.justificacion" required></textarea>
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
			<input @change.prevent="operacionAritmetica(['valorSinIva','valorIva'],'+','valorTotal')" type="text" class="form-control input-currency" id="valorSinIva" aria-describedby="valorSinIva" placeholder="Ingrese el valor sin IVA"  required>
		</div>
		<div class="form-group col-md-3">
			<label for="valorIva">Vr. IVA</label>
			<input @change.prevent="operacionAritmetica(['valorSinIva','valorIva'],'+','valorTotal')" type="text" class="form-control input-currency" id="valorIva" aria-describedby="valorIva" placeholder="Ingrese el valor con IVA"  required>
		</div>
		<div class="form-group col-md-3">
			<label for=" valorTotal">Vr. Total</label>
			<input type="text" class="form-control input-currency" id="valorTotal" aria-describedby="valorTotal" placeholder="Ingrese el valor total"  required>
		</div>
	</div>
	<div class="form-group text-center">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				Guardar
			</button>
		</div>
	</div>
</form>
