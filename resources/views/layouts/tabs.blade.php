@extends("layouts.app")

@section("content")
<div class="container">
	<div id="tabs" class="row">

		<ul>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-1">Datos</a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-2">Presupuesto </a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-3">Impuestos </a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-4">Bancos </a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-5">Contratos </a></li>
			<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-6">Reportes</a></li>
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
					<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-1">Prestación De Servicios</a></li>
					<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-2">Suministros</a></li>
					<li class="col-md-1 col-lg-1 tab-width"><a href="#tabs-3">Suministros de contrato</a></li>
				</ul>
			</div>
			<div id="tabs-1">
				<form @submit.prevent="CreateContrato" accept-charset="utf-8">
					<div class="row">
						<div class="form-group col-md-3">
							<label for="vigencia" class="form-label">Vigencia</label>
							<input type="text" class="form-control" id="vigencia" aria-describedby="vigencia" placeholder="Ingrese el año de vigencia" v-model="datos.vigencia" required @blur.prevent="GetConvocatorias()">
						</div>
					</div>
					</form>
				</div>

			</div>

			<div id="tabs-6">
				@include("reportes")
			</div>

		</div>
	</div>
	@endsection
