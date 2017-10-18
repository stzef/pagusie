@extends("layouts.app")

@section("content")
<div class="container">
	<div id="tabs" class="row">

		<ul>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-1">Datos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-2">Presupuesto &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-3">Impuestos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-4">Bancos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-5">Contratos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-6">Reportes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
		</ul>

		<div id="tabs-1">
			@include('datos')
		</div>

		<div id="tabs-2">
			@include("presupuesto")
		</div>

		<div id="tabs-3">
			@include("impuesto")
		</div>

		<div id="tabs-4">
			@include("bancos")
		</div>

		<div id="tabs-5">
			<div class="row">
				<div class="col-md-7 col-xs-7">
					<h4 v-if="terceroSelected.nombre">[[terceroSelected.nombre]]</h4>
				</div>
				<div class="col-md-4 col-xs-4">
					<h4 v-if="terceroSelected.vtotal">Valor: [[terceroSelected.vtotal]]</h4>
				</div>
			</div>
			
			<div id="tabsContrato" class="row">
				<ul>
					<li class="col-md-1 col-lg-1 col-xs-10 subtab-width"><a href="#tabs-1">Prestación De Servicios &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
					<li class="col-md-1 col-lg-1 col-xs-10 subtab-width"><a href="#tabs-2">Suministros &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
					<li class="col-md-1 col-lg-1 col-xs-10 subtab-width"><a href="#tabs-3">Suministros de contrato &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
					

					
				</ul>

				<div id="tabs-1">
					<form @submit.prevent="CreateContrato(1)" accept-charset="utf-8">
						<div class="row" style="margin-top: 30px">
							<div class="form-group col-md-3">
								<label for="fechaContraSE">Fecha</label>
								<datepicker calendar-button calendar-button-icon="fa fa-calendar" disabled-picker bootstrap-styling language="es" id="fechaContraSE" v-model="contrato.fechase" format="yyyy-MM-dd" required></datepicker>
							</div>
							<div class="form-group col-md-3">
								<label for="vigencia" class="form-label">Vr. Total</label>
								<input type="text" class="form-control input-currency" id="valorTotalCSE" aria-describedby="valorTotalCSE" placeholder="Ingrese el valor total"  required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="concepto">Texto</label>
								<textarea class="form-control" id="concepto" rows="10" v-model="contrato.textose" required></textarea>
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
				</div>
				<div id="tabs-2">
					<form @submit.prevent="CreateContrato(2)" accept-charset="utf-8">
						<div class="row" style="margin-top: 30px">
							<div class="form-group col-md-3">
								<label for="fechaContraSU">Fecha</label>
								<datepicker calendar-button calendar-button-icon="fa fa-calendar" disabled-picker bootstrap-styling language="es" id="fechaContraSU" v-model="contrato.fechasu" format="yyyy-MM-dd" required></datepicker>
							</div>
							<div class="form-group col-md-3">
								<label for="vigencia" class="form-label">Vr. Total</label>
								<input type="text" class="form-control input-currency" id="valorTotalCSU" aria-describedby="valorTotalCSU" placeholder="Ingrese el valor total"  required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="concepto">Texto</label>
								<textarea class="form-control" id="concepto" rows="10" v-model="contrato.textosu" required></textarea>
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
				</div>
				<div id="tabs-3">
					@include('listasuministros')
				</div>
			</div>
		</div>

		<div id="tabs-6">
			@include("reportes")
		</div>

	</div>
</div>
@endsection

@section('scripts')

@endsection