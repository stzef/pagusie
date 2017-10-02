@extends("layouts.app")
@section("content")
<div class="text-center">

	<h1>Editar Cuentas</h1>
</div>
<hr>
<!--
<table  class="display table-edit-datos" width="100%" cellspacing="0" >
	<thead>
		<tr>
			<th>Vigencia</th>
			<th>Convocatoria</th>
			<th>Tercero</th>
			<th>Concepto</th>
			<th>V. Total</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		<template v-for="(datos,index) in datosEdit">
			<tr>
				<td>[[datos.vigencia]]</td>
				<td>[[datos.convocatoria]]</td>
				<td>[[datos.tercero.nombre]]</td>
				<td>[[datos.concepto]]</td>
				<td>[[datos.vtotal]]</td>
				<td ><button @click.prevent="selectPresupuesto(index)" class="btn btn-info " data-dismiss="modal">Editar</button></td>
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
  :columns="columnsEditDatos"
  :rows="datosEdit"
  :paginate="true"
  :global-search="true"
  :line-numbers="true"
  style-class="table table-bordered"/>
  </div>


@endsection
@section('scripts')


@endsection