<div class="row">
	<div class="col-md-12 col-lg-12 text-center">
	<h1>RESPORTES</h1>
	</div>
</div>
<hr>
<table  class="table" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Documento Equivalente</td>
			<td>
				<form @submit.prevent="openReport('documentoequivalente',[[datos.cdatos]])" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form>
			</td>
		</tr>
		<tr>
			<td>Comprobante De Egreso</td>
			<td>
				<form @submit.prevent="openReport('comprobanteegreso',[[datos.cdatos]])" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form>
			</td>



		</tr>
		<tr>
			<td>Contrato Prestacion de Servicos</td>
			<td>
				<form @submit.prevent="openReport('contratoservicio',[[datos.cdatos]])" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form>
			</td>
		</tr>
	</tbody>
</table>