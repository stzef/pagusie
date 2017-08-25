import Vue from 'vue'
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import Multiselect from 'vue-multiselect';

import calcularDigitoVerificacion from './../../calcularDigitoVerificacion'
import currencyFormat from './../../currencyFormat'
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
		impuestos:[],
		valueImpuesto: {},
		terceroSelected:{},
		datos:{
			'cdatos':9,
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
			sumaRubros:'',
		},
		impuesto:{
			cimpu:'',
			vbase:'',
			porcentaje_Impuesto:'',
			vimpuesto:'',
			impuestosSeleccionados: [],
			sumaImpuestos:'',
		},
	},
	methods:{
		currencyFormat,
		calcularDigitoVerificacion,
		addRubro () {
			var vm = this
			var presupuesto = new Object();
			presupuesto.crubro=vm.valueRubros.crubro
			presupuesto.nrubro=vm.valueRubros.nrubro
			presupuesto.valor=document.querySelector("#vrubro").value
			if (vm.presupuesto.rubrosSeleccionados.some( (object) => object.crubro == presupuesto.crubro )){
				alertify.error("No se puede repetir el rubro")
			}else{
				vm.presupuesto.rubrosSeleccionados.push(presupuesto)
				alertify.success("Rubro Agregado")
				vm.sumarValorLista(this.presupuesto.rubrosSeleccionados,"valor","presupuesto.sumaRubros")
			}
		},
		removeRubro(index){
			var vm = this
			vm.presupuesto.rubrosSeleccionados.splice(index,1);
			alertify.success("Rubro Removido")
			vm.sumarValorLista(this.presupuesto.rubrosSeleccionados,"valor","presupuesto.sumaRubros")
		},
		addImpuesto () {
			var vm = this
			var impuesto = new Object();
			impuesto.cimpu=vm.valueImpuesto.cimpu
			impuesto.nimpuesto=vm.valueImpuesto.nimpuesto
			impuesto.vbase=document.querySelector("#valorBase").value
			impuesto.porcentaje_Impuesto=vm.impuesto.porcentaje_Impuesto
			impuesto.vimpuesto=document.querySelector("#valorImpuesto").value
			if (vm.impuesto.impuestosSeleccionados.some( (object) => object.cimpu == impuesto.cimpu )){
				alertify.error("No se puede repetir el impuesto")
			}else{
				vm.impuesto.impuestosSeleccionados.push(impuesto)
				alertify.success("Impuesto Agregado")
				//console.log(vm.impuesto.impuestosSeleccionados)
				vm.sumarValorLista(this.impuesto.impuestosSeleccionados,"vimpuesto","impuesto.sumaImpuestos")
			}
		},
		removeImpuesto(index){
			var vm = this
			vm.impuesto.impuestosSeleccionados.splice(index,1);
			alertify.success("Impuesto Removido")
			vm.sumarValorLista(this.impuesto.impuestosSeleccionados,"vimpuesto","impuesto.sumaImpuestos")
		},
		setDv(dv){
			console.info("dv",dv)
			this.terceros.dv=dv
		},
		showDepartamentos ({ndepartamento}) {
			var vm = this
			if(vm.valueDepartamento!=null){
				vm.terceros.cdepar= vm.valueDepartamento.cdepar
			}
			return `${ndepartamento}`
		},
		showCiudades ({nciudad}) {
			var vm = this
			if(vm.valueCiudad!=null){
				vm.terceros.cciud= vm.valueCiudad.cciud
			}
			return `${nciudad}`
		},
		showImpuestos ({nimpuesto, porcentajeImpuesto }) {
			var vm = this
			//vm.impuesto.cimpu = vm.valueImpuesto.cimpu
			//vm.impuesto.porcentaje_Impuesto=vm.valueImpuesto.porcentajeImpuesto
			vm.operacionAritmetica(['valorBase','porcentaje'],'%','valorImpuesto')
			return `${nimpuesto} — ${porcentajeImpuesto}%`
		},
		showRubros ({crubro, nrubro }) {
			var vm = this
			//vm.presupuesto.crubro = vm.valueRubros.crubro
			return `${crubro} — ${nrubro}`
		},
		showTerceros ({nit, nombre }) {
			var vm = this
			if(vm.valueTercero!=null){
				vm.datos.cterce= vm.valueTercero.cterce
			}
			return `${nit} — ${nombre}`
		},
		showTidocumento ({ntidocumento }) {
			var vm = this
			if(vm.valueTdocu!=null){
				vm.datos.ctidocumento= vm.valueTdocu.ctidocumento
			}
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
		// start getTercero function
		GetTercero(cterce,vtotal){
			var vm = this
			if(cterce==undefined){
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
			}else{
				fetch("terceros/show?cterce="+cterce,{ //ruta
				 	credentials: 'include',
				 	type : "GET",
				 }).then(response => {
				 	return response.json()
				 }).then(terceros => {
				 	console.log("metodo",terceros)
				 	vm.terceroSelected=terceros[0]
				 	vm.terceroSelected.vtotal=currencyFormat.format(vtotal)
			});
	}},
		//end getTercero function
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
			this.datos.vsiva=document.querySelector("#valorSinIva").value
			this.datos.viva=document.querySelector("#valorIva").value
			this.datos.vtotal=document.querySelector("#valorTotal").value
			var copydatos=Object.assign({},this.datos)
			copydatos.vsiva=currencyFormat.sToN(copydatos.vsiva)
			copydatos.viva=currencyFormat.sToN(copydatos.viva)
			copydatos.vtotal=currencyFormat.sToN(copydatos.vtotal)
			console.log("copydatos")
			var dato = $.param(copydatos)
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
					console.log(response.obj.cterce)
					//var selected=Object.assign({},this.GetTercero(response.obj.cterce))
					this.GetTercero(response.obj.cterce, response.obj.vtotal)

					//this.terceroSelected=selected
					//alertify.success(this.datos.cdatos)
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
		},
		GetImpuestos: function(){
			var vm = this
		fetch("impuesto/show",{ //ruta
			credentials: 'include',
			type : "GET",
		})
		.then(response => {
			return response.json()
		}).then(impuesto => {
			console.log(impuesto)
			vm.impuestos =impuesto
			vm.valueImpuesto = impuesto[0]
		});

	},
	list(table){
		$('.'+table).DataTable().destroy();
		$('.'+table).DataTable();
	},
	openReport(name,cdatos){
		window.open(name+"?cdatos="+cdatos);
	},
	createPresupuesto(){
		var vm = this
		vm._token = $('form').find("input").val()
		var cdatos=vm.datos.cdatos
		var presupuestoArray =vm.presupuesto.rubrosSeleccionados
		if (presupuestoArray.length == 0){
			alertify.error("Seleccione un rubro")
		}
		presupuestoArray.forEach(function (item, index, array) {
			var itemCopy = Object.assign({},item);
			itemCopy.valor=currencyFormat.sToN(itemCopy.valor)
			var presupuesto = $.param(itemCopy)
			presupuesto=presupuesto+"&cdatos="+cdatos
			fetch("/datospresupuesto/create",{
				credentials: 'include',
				method : "POST",
				type: "POST",
				headers: {
					'Accept': 'application/json, application/xml, text/plain, text/html, *.*',
					'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
					'X-CSRF-TOKEN' : vm._token,
				},
				body: presupuesto
			})
			.then(response => {
				console.log(response)
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
				alertify.error('Error al agregar el presupuesto '+item.nrubro)
			})
		});
	},
	createImpuesto(){
		var vm = this
		vm._token = $('form').find("input").val()
		var cdatos=vm.datos.cdatos
		var impuestoArray =vm.impuesto.impuestosSeleccionados
		if (impuestoArray.length == 0){
			alertify.error("Seleccione un impuesto")
		}
		impuestoArray.forEach(function (item, index, array) {
			var itemCopy = Object.assign({},item);
			itemCopy.vbase=currencyFormat.sToN(itemCopy.vbase)
			itemCopy.vimpuesto=currencyFormat.sToN(itemCopy.vimpuesto)
			var impuesto = $.param(itemCopy)
			impuesto=impuesto+"&cdatos="+cdatos
			fetch("/datosimpuesto/create",{
				credentials: 'include',
				method : "POST",
				type: "POST",
				headers: {
					'Accept': 'application/json, application/xml, text/plain, text/html, *.*',
					'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
					'X-CSRF-TOKEN' : vm._token,
				},
				body: impuesto
			})
			.then(response => {
				console.log(response)
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
				alertify.error('Error al agregar el impuesto '+item.nimpuesto)
			})
		});
	},
	operacionAritmetica(campos,operacion,final){
		var total=0
		campos.forEach(function (item, index, array) {
			if(operacion=='+'){
				total=total+currencyFormat.sToN(document.querySelector("#"+item).value)
			}
			if(operacion=='%'){
				if(index==0){
					total=currencyFormat.sToN(document.querySelector("#"+item).value)
				}else{
					var porcet=currencyFormat.sToN(document.querySelector("#"+item).value)/100
					total=total*porcet
					total=Math.round(total)
				}
			}
		});
		document.querySelector("#"+final).value=currencyFormat.format(total)
	},
	sumarValorLista(campos,campo,final){
		var total=0
		campos.forEach(function (item, index, array) {
			eval("total=total+currencyFormat.sToN(item."+campo+")");
		});
		eval("this."+final+"=currencyFormat.format(total)")
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
		vm.GetImpuestos()
		vm.GetTercero()
		//vm.GetTercero(1,300)
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
