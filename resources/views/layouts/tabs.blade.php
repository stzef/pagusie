@extends("layouts.app")

@section("content")
	<div class="container">
		<div id="tabs" class="row">

			<ul>
				<li class="col-md-1 col-lg-1"><a href="#tabs-1">Datos</a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-2">Presupuesto </a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-3">Impuestos </a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-4">Bancos </a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-5">Contratos </a></li>
				<li class="col-md-1 col-lg-1"><a href="#tabs-6">Reporte </a></li>
			</ul>

			<div id="tabs-1">
				@include('datos')
			</div>

			<div id="tabs-2">
			</div>

			<div id="tabs-3">
			</div>

			<div id="tabs-4">
			</div>

			<div id="tabs-5">
			</div>

			<div id="tabs-6">
			</div>

		</div>
	</div>
@endsection
