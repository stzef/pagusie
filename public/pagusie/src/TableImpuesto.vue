<template>
   <table v-if="impuesto.length!=0" class="table-striped table-bordered text-center" width="100%" cellspacing="0">
	<thead>
		<tr style="background-color: #f2f2f2;" align="center">
			<td><strong>Nombre</strong></td>
			<td><strong>Valor Base</strong></td>
			<td><strong>Porcentaje</strong></td>
			<td><strong>Valor Impuesto</strong></td>
			<td><strong></strong></td>
		</tr>
	</thead>
	<tbody>
		<template v-for="(impu,index) in impuesto">
			<tr>
				<td>{{impu.nimpuesto}}</td>
				<td align="right">{{impu.vbase}}</td>
				<td>{{impu.porcentaje_Impuesto}}%</td>
				<td align="right">{{impu.vimpuesto}}</td>
				<td>
					<button v-on:click="remoImpuesto(index)" class="btn btn-danger btn-xs" > <span class="glyphicon glyphicon-remove"></span></button></td>
			</tr>
		</template>
		<tr style="background-color: #f2f2f2;">
			<td colspan="3"  align="center" ><strong>Total Descuento</strong></td>
			<td  align="right">
				<strong>{{sumaimpuestos}}</strong>
			</td>
		</tr>
		<tr style="background-color: #f2f2f2;">
			<td colspan="3" v-if="impuesto.length!=0" align="center" ><strong>Valor A Pagar</strong></td>
			<td v-if="impuesto.length!=0" align="right">
				<strong>{{netopagar}}</strong>
			</td>
		</tr>

	</tbody>

</table>     
</template>
<script>
export default {
  name: 'table-impuesto',
  props: {
    sumaimpuestos: {type: String,},
    netopagar: {type: String,},
    impuesto: {type: Array,},
  },
    methods: {
    remoImpuesto: function (index) {
       this.$emit('eventimpuesto',index)
    }
  },

  mounted (){this.$emit("mounted")}
}
</script>
<style></style>

