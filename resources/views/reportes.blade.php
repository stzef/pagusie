<table  class="table" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Acción</th>
		</tr>
	</thead> 
	<tbody>
		<tr>
			<td>Documento Equivalente [[datos.cdatos]]</td>
			<td>
			<a href="documentoequivalente?cdatos=5" target="_blank" class="btn btn-primary">Generar</a>			</td>
			</tr>
			<tr>
				<td>Comprobante De Egreso</td>


				

			</tr>
			<tr>
				<td>Contrato Prestacion de Servicos</td>
				<td><form @submit.prevent="openReport(documentoequivalente)" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form></td>
			</tr>
		</tbody>
	</table>