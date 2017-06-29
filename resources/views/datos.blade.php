<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PagusIE') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" >
    
</head>
<body>
<form>
  <div class="form-group">
    <label for="vigencia">Vigencia</label>
    <input type="text" class="form-control" id="vigencia" aria-describedby="vigencia" placeholder="Ingrese el año de vigencia">
  </div>
	<div class="form-group">
		<label for="cegreso">Vigencia</label>
		<input type="text" class="form-control" id="vigencia" aria-describedby="vigencia" placeholder="Ingrese el año de vigencia">
	</div>



  <div class="form-group">
    <label for="tidocumento">Tipo de documento</label>
    <input type="text" class="form-control" id="tidocumento" aria-describedby="tidocumento" placeholder="Ingrese el tipo de documento">
  </div>
  <div class="form-group">
    <label for="tercero">Tercero</label>
    <input type="text" class="form-control" id="tercero" aria-describedby="tercero" placeholder="Ingrese el tipo de documento">
  </div>
  <div class="form-group">
    <label for="tercero">Tercero</label>
    <input type="text" class="form-control" id="tercero" aria-describedby="tercero" placeholder="Ingrese el tipo de documento">
  </div>
 </form> 

	 <!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
     <!-- Bootstrap JavaScript -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>