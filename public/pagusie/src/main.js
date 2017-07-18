
import Vue from 'vue'
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import Multiselect from 'vue-multiselect';
Vue.component('select-documento',{
	props: ['id','tidocumento','datos'],
	template:
	`<div class="col-md-12">
	<select v-model="datos.ctidocumento" :name="id" :id="id" class="form-control input-sm"> 
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
    	app.datos.ctidocumento = "1"
    });
}})

var app=new Vue({
	el: '#app-vue',
	components:{
		Datepicker,
		Multiselect,
	},
	data : {
		date: moment().locale('es').format('YYYY-MM-DD'),
		tidocumento:[],
		departamentos:[],
		ciudades:[],
		_token:'',
		tercero:[],
		datos:{
			'cterce':'',
			'ctidocumento':'',
			'cestado':'1',
			'vigencia':'',
			'cegre':'',
			'fpago':'',
			'cterce':'',
			'ffactu':'',
			'nfactu':'',
			'concepto':'',
			'justificacion':'',
			'plazo':'',
			'festcomp':'',
			'fdispo':'',
			'fregis':'',
			'vsiva':'',
			'viva':'',
			'vtotal':''
		},
		terceros:{
			'cterce':'',
			'cdepar':'',
			'cciud':'',
			'nit':'',
			'nombre':'',
			'telefono':'',
			'direccion':'',
			'email':''
		},
		value: {},
		options: []

	},
	methods:{
		nameWithLang ({cterce, nit, nombre }) {
			var vm = this
			vm.datos.cterce= vm.value.cterce
			return `${nit} — ${nombre}`
		},
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
		// start getTercerero function

		//end getTercerero function
		CreateTercero:function(){
			this._token = $('form').find("input").val()
			var tercero = $.param(this.terceros)
			fetch("/terceros/create",{
				credentials: 'include',
				method : "POST",
				type: "POST",
				headers: {
					'Accept': 'application/json, application/xml, text/plain, text/html, *.*',
					'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
					'X-CSRF-TOKEN' : this._token,
				},
				body: tercero,
			}) 
			.then(response => {
				//console.info(response)
				return response.json();
			})
			
			.then(response => {
				console.log(response["message"])
				if(response.status == 400){
					alertify.error(response["message"])
				}else{
					alertify.success('Creación Exitosa')
				}
			})
			.catch(function(error) {
				console.warn(error)
				alertify.error('Error al crear el tercero')
			})
		},
		SetFormatDate:function(){
			this.datos.fpago=moment(this.datos.fpago, 'YYYY-MM-DD').format('YYYY-MM-DD')
			this.datos.ffactu=moment(this.datos.ffactu, 'YYYY-MM-DD').format('YYYY-MM-DD')
			this.datos.festcomp=moment(this.datos.festcomp, 'YYYY-MM-DD').format('YYYY-MM-DD')
			this.datos.fdispo=moment(this.datos.fdispo, 'YYYY-MM-DD').format('YYYY-MM-DD')
			this.datos.fregis=moment(this.datos.fregis, 'YYYY-MM-DD').format('YYYY-MM-DD')
		},
		CreateDatos:function(){
			this._token = $('form').find("input").val()
			this.SetFormatDate()
			var dato = $.param(this.datos)
			console.log(dato)
			fetch("/datos/create",{
				credentials: 'include',
				method : "POST",
				type: "POST",
				headers: {
					'Accept': 'application/json, application/xml, text/plain, text/html, *.*',
					'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
					'X-CSRF-TOKEN' : this._token,
				},
				body: dato,
			}) 
			.then(response => {
				console.info(response)
				return response.json();
			})
			.then(response => {
				console.log(response["message"])
				if(response.status == 400){
					alertify.error(response["message"])
				}else{
					alertify.success('Creación Exitosa')
				}
			})
			.catch(function(error) {
				console.warn(error)
				alertify.error('Error al crear los datos basicos')
			})
		},
	},// end methods
	delimiters : ["[[","]]"],
	mounted (){
		var vm = this
		vm.datos.fpago=vm.date
		vm.datos.ffactu=vm.date
		vm.datos.festcomp=vm.date
		vm.datos.fdispo=vm.date
		vm.datos.fregis=vm.date
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
	    fetch("terceros/show",{ //ruta 
	    	credentials: 'include',
	    	type : "GET",
	    }).then(response => {
	    	return response.json()
	    }).then(terceros => {
	    	console.log(terceros)
	    	this.options = terceros
	    	this.value = terceros[0]
	    });

	}
})
