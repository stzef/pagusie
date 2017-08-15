@extends("layouts.app")

@section("content")
	<div class="container">
		<div id="tabs" class="row">

			<ul>
				<li class="col-md-1 col-lg-1"><a href="#tabs-1">Datos</a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-2" @click = "list('table-presupuestos-seleccionados')">Presupuesto </a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-3">Impuestos </a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-4">Bancos </a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-5">Contratos </a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-6" @click = "list('table-reportes')">Reporte </a></li>
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
			</div>

			<div id="tabs-5">
			</div>

			<div id="tabs-6">
			@include("reportes")
			</div>

		</div>
	</div>
@endsection
