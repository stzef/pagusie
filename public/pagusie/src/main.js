
import Vue from 'vue'
import Datepicker from 'vuejs-datepicker'
import moment from 'moment';
Vue.component('select-documento',{
	props: ['id','tidocumento','dato'],
	template:
	`<div class="col-md-12">
	<select v-model="dato.ctidocumento" :name="id" :id="id" class="form-control input-sm"> 
	<option v-for="tidocu in tidocumento"  :value="tidocu.ctidocumento">{{tidocu.ntidocumento}}</option> 
	</select>
	</div>`,
	created: function(){
    fetch("api/tipo_documento",{ //ruta 
    	credentials: 'include',
    	type : "GET",
    })
    .then(response => {
    	return response.json()
    }).then(tidocumentos => {
    	console.log(tidocumentos)
    	app.tidocumento = tidocumentos
    	app.dato.ctidocumento = "1"
    });
}})


var app=new Vue({
	el: '#app-vue',
	components:{
		Datepicker,
	},
	data : {
		date: moment().locale('es').format('YYYY-MM-DD'),
		saludo : "Hola",
		tidocumento:[],
		departamentos:[],
		ciudades:[],
		dato:{
			'ctidocumento':''
		},
		terceros:{
			'cdepar':'',
			'cciud':''
		}	
	},
	methods:{
		GetCiudades: function(cdepar){
		var vm = this
		fetch("api/ciudades?cdepar="+cdepar,{ //ruta 
	    	credentials: 'include',
	    	type : "GET",
	    })
	    .then(response => {
	    	return response.json()
	    }).then(ciudades => {
	    	
	    	console.log(ciudades)
	    	vm.ciudades =ciudades
	    	console.log(vm.ciudades)
	    	if (vm.terceros.cdepar=="29") {
	    		vm.terceros.cciud = "1042"
	    	}else{
	    		//alert(JSON.parse(app.ciudades))
	    		vm.terceros.cciud = ciudades[0].cciud
	    	}
	    });

		},// end ciudades function
	},// end methods
	delimiters : ["[[","]]"],
	mounted (){
		var vm = this
	    fetch("api/departamentos/",{ //ruta 
	    	credentials: 'include',
	    	type : "GET",
	    })
	    .then(response => {
	    	return response.json()
	    }).then(departamentos => {
	    	vm.departamentos = departamentos
	    	vm.terceros.cdepar="29"
	    	this.GetCiudades(vm.terceros.cdepar)

	    });
		
	}
})
