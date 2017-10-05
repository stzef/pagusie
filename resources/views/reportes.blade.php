<form @submit.prevent="CreateDatos" accept-charset="utf-8">
	<div class="row" v-if="estado=='guardar'">
		<div class="form-inline col-md-12 col-lg-12 text-center">
			<label> Convocatoria Nº</label>
			<input type="text" class="form-control" id="convocatoria" aria-describedby="convocatoria" v-model="datos.convocatoria" required style="width: 5%">
			<button type="submit" class="btn btn-primary">
				[[textoBoton]]
			</button>
		</div>
	</div>
</form>
<div class="row">
	<div class="col-md-12 col-lg-12 text-center">
		<h1>REPORTES</h1>
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
			<td>Recibo De Satisfacción</td>
			<td>
				<form @submit.prevent="openReport('recibosatisfaccion',[[datos.cdatos]])" accept-charset="utf-8">
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
		<tr>
			<td>Disponibilidad Presupuestal</td>
			<td>
				<form @submit.prevent="openReport('disponibilidadpresupuestal',[[datos.cdatos]])" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form>
			</td>
		</tr>
		<tr>
			<td>Registro Presupuestal</td>
			<td>
				<form @submit.prevent="openReport('registropresupuestal',[[datos.cdatos]])" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form>
			</td>
		</tr>
		<tr>
			<td>Certificado De Precios Del Mercado</td>
			<td>
				<form @submit.prevent="openReport('certificadopreciosmercado',[[datos.cdatos]])" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form>
			</td>
		</tr>
		<tr>
			<td>Contrato De Suministros <small><strong>FALTA</strong></small></td>
			<td>
				<form @submit.prevent="openReport('contratosuministro',[[datos.cdatos]])" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form>
			</td>
		</tr>
		<tr>
			<td>Comprobante De Entrada De Almacen <small><strong>FALTA</strong></small></td>
			<td>
				<form @submit.prevent="openReport('comprobanteentradaalmacen',[[datos.cdatos]])" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form>
			</td>
		</tr>
		<tr>
			<td>Comprobante De Salida De Almacen <small><strong>FALTA</strong></small></td>
			<td>
				<form @submit.prevent="openReport('comprobantesalidaalmacen',[[datos.cdatos]])" accept-charset="utf-8">
					<button type="submit" class="btn btn-primary">
						Generar
					</button>
				</form>
			</td>
		</tr>
	</tbody>
</table>