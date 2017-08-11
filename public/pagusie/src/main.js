
import Vue from 'vue'
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import Multiselect from 'vue-multiselect';

import calcularDigitoVerificacion from './../../calcularDigitoVerificacion'
import $ from 'jquery';
import 'datatables.net'
//window.$ = $;

var app=new Vue({
	el: '#app-vue',
	components:{
		Datepicker,
		Multiselect,
	},
	data : {
		date: moment().locale('es').format('YYYY-MM-DD'),
		tidocumento:[],
		valueTdocu: {},
		departamentos:[],
		valueDepartamento: {},
		ciudades:[],
		valueCiudad: {},
		_token:'',
		tercero:[],
		valueTercero: {},
		rubros:[],
		valueRubros: {},
		datos:{
			'cdatos':'',
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
			'dv':'',
			'nombre':'',
			'telefono':'',
			'direccion':'',
			'email':''
		},
		presupuesto:{
			crubro:'',
			valor:'',
			rubrosSeleccionados: [],
		},
	},
	methods:{
		calcularDigitoVerificacion,
		addRubro () {
			var vm = this
			var presupuesto = new Object();
			presupuesto.crubro=vm.valueRubros.crubro
			presupuesto.nrubro=vm.valueRubros.nrubro
			presupuesto.valor=vm.presupuesto.valor
			if (vm.presupuesto.rubrosSeleccionados.some( (object) => object.crubro == presupuesto.crubro )){
				alertify.error("No se puede repetir el rubro")
			}else{
				vm.presupuesto.rubrosSeleccionados.push(presupuesto)
				alertify.success("Rubro Agregado")
			}
		},
		setDv(dv){
			console.info("dv",dv)
			this.terceros.dv=dv
		},
		showDepartamentos ({ndepartamento}) {
			var vm = this
			vm.terceros.cdepar= vm.valueDepartamento.cdepar
			return `${ndepartamento}`
		},
		showCiudades ({nciudad}) {
			var vm = this
			vm.terceros.cciud= vm.valueCiudad.cciud
			return `${nciudad}`
		},
		showRubros ({crubro, nrubro }) {
			var vm = this
			vm.presupuesto.crubro = vm.valueRubros.crubro
			return `${crubro} — ${nrubro}`
		},
		showTerceros ({nit, nombre }) {
			var vm = this
			vm.datos.cterce= vm.valueTercero.cterce
			return `${nit} — ${nombre}`
		},
		showTidocumento ({ntidocumento }) {
			var vm = this
			vm.datos.ctidocumento= vm.valueTdocu.ctidocumento
			return `${ntidocumento}`
		},
		GetCiudades: function(){
			var vm = this
			var cdepar= vm.valueDepartamento.cdepar
		fetch("api/ciudades?cdepar="+cdepar,{ //ruta
			credentials: 'include',
			type : "GET",
		})
		.then(response => {
			return response.json()
		}).then(ciudades => {

			vm.ciudades =ciudades
			console.log(vm.valueDepartamento.cdepar==29)
			if (vm.valueDepartamento.cdepar==29) {
				vm.valueCiudad = vm.ciudades[26]
			}else{
				vm.valueCiudad = vm.ciudades[0]
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
					this.datos.cdatos=response.obj.id
					alertify.success(this.datos.cdatos)

				}
			})
			.catch(function(error) {
				console.warn(error)
				alertify.error('Error al crear los datos basicos')
			})
		},
		GetRubros: function(){
			var vm = this
		fetch("presupuesto/show",{ //ruta
			credentials: 'include',
			type : "GET",
		})
		.then(response => {
			return response.json()
		}).then(rubros => {

			vm.rubros =rubros
			vm.valueRubros = rubros[0]
			
		});
		},// end ciudades function
		list(table){
			$('.'+table).DataTable().destroy();
			$('.'+table).DataTable();
		},
		createPresupuesto(){
			this._token = $('form').find("input").val()
			this.SetFormatDate()
			var presupuesto = $.param(this.presupuesto.rubrosSeleccionados)
			var cdatos = $.param(this.datos.cdatos);
			console.log(presupuesto)

			fetch("/datos/create",{
				credentials: 'include',
				method : "POST",
				type: "POST",
				headers: {
					'Accept': 'application/json, application/xml, text/plain, text/html, *.*',
					'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
					'X-CSRF-TOKEN' : this._token,
				},
				body: presupuesto,cdatos
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
		//$("#table").DataTable();
		var vm = this
		vm.datos.fpago=vm.date
		vm.datos.ffactu=vm.date
		vm.datos.festcomp=vm.date
		vm.datos.fdispo=vm.date
		vm.datos.fregis=vm.date
		vm.GetRubros()
	    fetch("api/departamentos/",{ //ruta
	    	credentials: 'include',
	    	type : "GET",
	    })
	    .then(response => {
	    	return response.json()
	    }).then(departamentos => {
	    	vm.departamentos = departamentos
	    	//vm.terceros.cdepar="29"
	    	vm.valueDepartamento=departamentos[28]
	    	this.GetCiudades()

	    });
	    fetch("terceros/show",{ //ruta
	    	credentials: 'include',
	    	type : "GET",
	    }).then(response => {
	    	return response.json()
	    }).then(terceros => {
	    	console.log(terceros)
	    	vm.tercero = terceros
	    	vm.valueTercero = terceros[0]
	    });

	      fetch("api/tipo_documento",{ //ruta
	      	credentials: 'include',
	      	type : "GET",
	      }).then(response => {
	      	return response.json()
	      }).then(tidocumentos => {
	      	console.log(tidocumentos)
	      	vm.tidocumento = tidocumentos
	      	vm.valueTdocu=tidocumentos[0]
	      });

	  }
	})
