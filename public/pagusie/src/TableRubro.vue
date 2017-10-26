<template>
      <table class="table-striped table-bordered text-center" width="100%" cellspacing="0">
		<thead>
			<tr style="background-color: #f2f2f2;" align="center">
				<td><strong>Rubro</strong></td>
				<td><strong>Nombre</strong></td>
				<td><strong>Valor</strong></td>
				<td><strong></strong></td>
			</tr>
		</thead>
		<tbody>
			<template v-for="(rubro,index) in presupuesto">
				<tr>
					<td>{{rubro.crubro}}</td>
					<td>{{rubro.nrubro}}</td>
					<td align="right">{{rubro.valor}}</td>
					<td> <button v-on:click="removeRubro(index)" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>{{index}}</button> </td>
				</tr>
			</template>
			<tr style="background-color: #f2f2f2;">
				<td colspan="2" align="center"><strong>Total</strong></td>
				<td align="right">
					<strong> {{sumarubros}}</strong>
				</td>

			</tr>
		</tbody>
	</table>       
</template>
<script>
export default {
  name: 'select-rol',
  props: {
    sumarubros: {type: String,},
    presupuesto: {type: Array,},
    click: 'removeRubro(index)',
  },
    events: {
        'click': function() {
            this.removeRubro();
        }
        },

  mounted (){this.$emit("mounted")}
}
</script>
<style></style>

