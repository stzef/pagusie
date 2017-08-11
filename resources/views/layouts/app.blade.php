<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'PagusIE') }}</title>


	<link href="{{URL::asset('bower_components/alertifyjs/dist/css/alertify.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.0.0/dist/vue-multiselect.min.css"> -->

	<link rel="stylesheet" href="{{ URL::asset('pagusie/node_modules/vue-multiselect/dist/vue-multiselect.min.css')}}"></link>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('bower_components/datatables.net-dt/css/jquery.dataTables.css') }}" >
</head>
<body>
	<div id="app-vue">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">

					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="{{ url('/') }}">
						{{ config('app.name', 'PagusIE') }}
					</a>
				</div>

				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<ul class="nav navbar-nav">
						&nbsp;
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ route('login') }}">Ingresar</a></li>
							<li><a href="{{ route('register') }}">Registrarse</a></li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ route('logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											Salir
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>

		@yield('content')

	</div>


	@yield('scripts')

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('pagusie/dist/build.js') }}"></script>
	<script src="{{ asset('bower_components/alertifyjs/dist/js/alertify.js') }}"></script>
	<script src="{{ URL::asset('bower_components/datatables.net/js/jquery.dataTables.js') }}" ></script>

	<script>
		$( function() {
			var tabs = $( "#tabs" ).tabs();

			tabs.find( ".ui-tabs-nav" ).sortable({
				axis: "x",
				stop: function() {
					tabs.tabs( "refresh" );
				}
			});
		});
	</script>
</body>
</html>
