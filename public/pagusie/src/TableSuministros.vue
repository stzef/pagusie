<template>
   <table v-if="suministros.length!=0" class="table-striped table-bordered text-center" width="100%" cellspacing="0">
			<thead>
				<tr style="background-color: #f2f2f2;" align="center">
					<td><strong>N°</strong></td>
					<td><strong>Nombre Y Especificación De Articulos</strong></td>
					<td><strong>Grupo Inventario</strong></td>
					<td><strong>UND. Medida</strong></td>
					<td><strong>Cantidad</strong></td>
					<td><strong>Vr. Unitario</strong></td>
					<td><strong>Vr. Total</strong></td>
					<td><strong></strong></td>
				</tr>
			</thead>
			<tbody>
				<template v-for="(suministro,index) in suministros">
					<tr>
						<td>{{index+1}}</td>
						<td>{{suministro.narticulo}}</td>
						<td>{{suministro.grupo}}</td>
						<td>{{suministro.nunidad}}</td>
						<td>{{suministro.canti}}</td>
						<td align="right">{{suministro.vunita}}</td>
						<td align="right">{{suministro.vtotal}}</td>
						<td >
							<button v-on:click="remoSuministro(index)" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
							<button v-on:click="editSumi(index)" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-edit"></span></button>
						</td>
					</tr>
				</template>
				<tr style="background-color: #f2f2f2;">
					<td colspan="6" v-if="suministros.length!=0" align="center"><strong>Total</strong></td>
					<td v-if="suministros.length!=0" align="right">
						<strong> {{sumasuministros}}</strong>
					</td>

				</tr>
			</tbody>
		</table>
</template>
<script>
export default {
  name: 'table-suministros',
  props: {
    sumasuministros: {type: String,},
    suministros: {type: Array,},
  },
    methods: {
    remoSuministro: function (index) {
       this.$emit('eventsumiremove',index)
    },
    editSumi: function (index) {
       this.$emit('eventsumiedit',index)
    }
  },

  mounted (){this.$emit("mounted")}
}
</script>
<style></style>

