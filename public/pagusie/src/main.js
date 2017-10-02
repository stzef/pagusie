import Vue from 'vue'
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import Multiselect from 'vue-multiselect';
import calcularDigitoVerificacion from './../../calcularDigitoVerificacion'
import currencyFormat from './../../currencyFormat'
import $ from 'jquery';
import 'datatables.net'
import VueGoodTable from 'vue-good-table';
Vue.use(VueGoodTable);
//window.$ = $;

var app=new Vue({
	el: '#app-vue',
	components:{
		Datepicker,
		Multiselect,
	},
	
	data : {
		columnsEditDatos:[
		{
			label: 'Vigencia',
			field: 'vigencia',
		},
		{
			label: 'Convocatoria',
			field: 'convocatoria',
		},
		{
			label: 'Tercero',
			field: 'tercero.nombre',
		},
		{
			label: 'Concepto',
			field: 'concepto',
		},{
			label: 'V. Total',
			field: 'vtotal',
			tdClass:'text-right'
		},
		{
			label: 'Editar',
			field: 'editar',
			htmlContent: '<button>Hello</button>',
			html: true,

		},
		{
			label: 'Duplicar',
			field: 'duplicar',
			html: true,
		},
		],
		columnsTerceros: [
		{
			label: 'Nit',
			field: 'nit',
		},
		{
			label: 'Nombre',
			field: 'nombre',
		},
		{
			label: 'Teléfono',
			field: 'telefono',
		},
		{
			label: 'E-Mail',
			field: 'email',
		},
		],
		columnsPresupuestos: [
		{
			label: 'Rubro',
			field: 'crubro',
		},
		{
			label: 'Nombre',
			field: 'nrubro',
		},
		{
			label: 'Valor Presupuestado',
			field: 'vr_rubro_presupuestado',
		},
		{
			label: 'Valor Ejecutado',
			field: 'vr_rubro_ejecutado',
		},
		],
		columnsBancos: [
		{
			label: 'Nombre',
			field: 'nbanco',
		},
		{
			label: 'Número de cuenta',
			field: 'numcuenta',
		},
		],
		date: moment().locale('es').format('YYYY-MM-DDThh:mm:00.000Z'),
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
		bancos:[],
		datosEdit:[],
		valueImpuesto: {},
		terceroSelected:{},
		datos:{
			'cdatos':'',
			'cterce':'',
			'ctidocumento':'',
			'cestado':'1',
			'vigencia':'',
			'convocatoria':'',
			'fpago':'',
			'cterce':'',
			'ffactu':'',
			'nfactu':'',
			'concepto':'',
			'justificacion':'',
			'plazo':'4 días',
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
			'email':'',
			'cnombre':'',
			'ctelefono':'',
			'cemail':''
		},
		presupuesto:{
			crubro:'',
			nrubro:'',
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
			netopagar:'',
		},
		banco:{
			cbanco:'',
			nbanco:'',
			numcuenta:'',
			idcuentas_bancos:'',
		},
		cheque:{
			idcheque:'',
			idcuentas_bancos:'',
			numcheque:'',
			cestado:1,
			concepto:'',
			valor:'',
			sumaCheques:'',
			chequesSeleccionados:[],
		},
	},
	methods:{
		currencyFormat,
		calcularDigitoVerificacion,
		addRubro () {
			var vm = this
			if((currencyFormat.sToN(this.presupuesto.sumaRubros)+currencyFormat.sToN(document.querySelector("#vrubro").value))>currencyFormat.sToN(this.datos.vtotal)){
				alertify.error("El presupuesto no pueden sobrepasar al valor total")
			}else{
				var presupuesto = new Object();
				presupuesto.crubro=vm.presupuesto.crubro
				presupuesto.nrubro=vm.presupuesto.nrubro
				presupuesto.valor=document.querySelector("#vrubro").value
				if (vm.presupuesto.rubrosSeleccionados.some( (object) => object.crubro == presupuesto.crubro )){
					alertify.error("No se puede repetir el rubro")
				}else{
					vm.presupuesto.rubrosSeleccionados.push(presupuesto)
					alertify.success("Rubro Agregado")
					vm.sumarValorLista(vm.presupuesto.rubrosSeleccionados,"valor","presupuesto.sumaRubros")
				}
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
			if(currencyFormat.sToN(this.impuesto.sumaImpuestos)>currencyFormat.sToN(this.datos.vtotal)){
				alertify.error("Los impuestos no pueden sobrepasar al valor total")
			}else{
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

			//document.querySelector("#porcentaje").value=vm.valueImpuesto.porcentajeImpuesto
			vm.impuesto.porcentaje_Impuesto=vm.valueImpuesto.porcentajeImpuesto

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
				 fetch("api/terceros",{ //ruta
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
				fetch("api/terceros?cterce="+cterce,{ //ruta
					credentials: 'include',
					type : "GET",
				}).then(response => {
					return response.json()
				}).then(terceros => {
					vm.terceroSelected=terceros[0]
					vm.terceroSelected.vtotal=currencyFormat.format(vtotal)
				});
			}
		},
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
					this.datos.cterce=response.obj.id
					console.log(response.obj.id)
					alertify.success('Creación Exitosa')
				}
			})
			.catch(function(error) {
				console.warn(error)
				alertify.error('Error al crear el tercero')
			})
			this.GetTercero()

			//this.datos.cterce=this.terceros[this.terceros.length].cterce
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
			if(this.datos.cdatos==''){
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
					document.querySelector("#valorBase").value=this.datos.vsiva
					document.querySelector("#vrubro").value=this.datos.vtotal
					//this.terceroSelected=selected
					//alertify.success(this.datos.cdatos)
				}
			})
				.catch(function(error) {
					console.warn(error)
					alertify.error('Error al crear los datos basicos')
				})
			}else{
				fetch("/datos/update",{
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
						alertify.success('Datos Guardados Nuevamente')
						console.log("terceros",this.valueTercero.cterce)
						this.GetTercero(this.valueTercero.cterce, currencyFormat.sToN(this.datos.vtotal))
						document.querySelector("#valorBase").value=this.datos.vsiva
						document.querySelector("#vrubro").value=this.datos.vtotal
					}
				})
				.catch(function(error) {
					console.warn(error)
					alertify.error('Error al guardar los datos basicos nuevamente')
				})
			}
		},
		GetRubros: function(){
			var vm = this
			fetch("api/presupuestos",{ //ruta
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
		fetch("api/impuestos",{ //ruta
			credentials: 'include',
			type : "GET",
		})
		.then(response => {
			return response.json()
		}).then(impuesto => {
			vm.impuestos =impuesto
			vm.valueImpuesto = impuesto[0]
		});

	},
	list(table){
		console.log(table)
		$('.'+table).DataTable().destroy();
		$('.'+table).DataTable( {
			"language": {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			}
		} );
	},
	openReport(name,cdatos){
		window.open(name+"?cdatos="+cdatos);
	},
	openEdit(){
		console.log("jhonan")
		window.location.replace("localhost");
	},
	createPresupuesto(){
		var vm = this
		vm._token = $('form').find("input").val()
		var cdatos=vm.datos.cdatos
		var presupuestoArray =vm.presupuesto.rubrosSeleccionados
		if (presupuestoArray.length == 0){
			alertify.error("Seleccione un rubro")
		}
		if(currencyFormat.sToN(this.presupuesto.sumaRubros)>currencyFormat.sToN(this.datos.vtotal)){
			alertify.error("El presupuesto no pueden sobrepasar al valor total")
		}else{
			presupuestoArray.forEach(function (item, index, array) {
				var itemCopy = Object.assign({},item);
				itemCopy.valor=currencyFormat.sToN(itemCopy.valor)
				var presupuesto = $.param(itemCopy)
				presupuesto=presupuesto+"&cdatos="+cdatos+"&index="+index
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
			});}
		},
		createImpuesto(){
			var vm = this
			vm._token = $('form').find("input").val()
			var cdatos=vm.datos.cdatos
			var impuestoArray =vm.impuesto.impuestosSeleccionados
			if (impuestoArray.length == 0){
				alertify.error("Seleccione un impuesto")
			}
			if(currencyFormat.sToN(this.impuesto.sumaImpuestos)>currencyFormat.sToN(this.datos.vtotal)){
				alertify.error("Los impuestos no pueden sobrepasar al valor total")
			}else{
				impuestoArray.forEach(function (item, index, array) {
					var itemCopy = Object.assign({},item);
					itemCopy.vbase=currencyFormat.sToN(itemCopy.vbase)
					itemCopy.vimpuesto=currencyFormat.sToN(itemCopy.vimpuesto)
					var impuesto = $.param(itemCopy)
					impuesto=impuesto+"&cdatos="+cdatos+"&index="+index
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
			}
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
			if(final="impuesto.sumaImpuestos"){
				if(currencyFormat.sToN(this.impuesto.sumaImpuestos)>=currencyFormat.sToN(this.datos.vtotal)){
					alertify.error("Los impuestos no pueden sobrepasar al valor total")
				}
				this.impuesto.netopagar=currencyFormat.format(currencyFormat.sToN(this.datos.vtotal)-currencyFormat.sToN(this.impuesto.sumaImpuestos))
			}
		},
		existsComprobanteEgreso(){
			var cegre=this.datos.cegre
		fetch("api/comprobanteegreso/?cegre="+cegre,{ //ruta
			credentials: 'include',
			type : "GET",
		})
		.then(response => {
			return response.json()
		}).then(comprobanteegreso => {
			console.log(comprobanteegreso)
			if(comprobanteegreso){
				alertify.error("Codigo comprobante egreso ya esta registrado")
			}
		});
	},
	GetDatosPresupuesto(cdatos){
		var vm = this
		if(cdatos==undefined){
			fetch("datospresupuesto/show",{ //ruta
				credentials: 'include',
				type : "GET",
			}).then(response => {
				return response.json()
			}).then(dpresu => {
				console.log(dpresu)
				return dpresu
			});
		}else{
			console.log("hp",cdatos)
				fetch("datospresupuesto/show?cdatos="+cdatos,{ //ruta
					credentials: 'include',
					type : "GET",
				}).then(response => {
					return response.json()
				}).then(dpresu => {
					console.log(dpresu)
					return dpresu
				});
			}
		},
		CountDatosPresupuesto(cdatos){
			var vm = this
			if(cdatos==undefined){
			fetch("datospresupuesto/count",{ //ruta
				credentials: 'include',
				type : "GET",
			}).then(response => {
				return response.json()
			}).then(dpresu => {
				console.log(dpresu)
				return dpresu
			});
		}else{
			console.log("hp",cdatos)
				fetch("datospresupuesto/count?cdatos="+cdatos,{ //ruta
					credentials: 'include',
					type : "GET",
				}).then(response => {
					return response.json()
				}).then(dpresu => {
					console.log(dpresu)
					return dpresu
				});
			}
		},
		selectTercero(index){
			this.datos.cterce =index.cterce
			this.terceros.nit=index.nit
			this.terceros.nombre=index.nombre
			//console.log(document.getElementById("searchtercero").id)
			alertify.success('Tercero Seleccionado')
		},
		searchTercero(){
			var nit=this.terceros.nit
			var nombre=""
			var cterce=""
			this.tercero.find(function(value, index) {
				if(value.nit==nit){
					cterce=value.cterce
					nombre=value.nombre
					console.log(value.nombre)
				}
			}
			)
			this.datos.cterce= cterce
			this.terceros.nombre=nombre
		},
		selectPresupuesto(index){

			//this.tercero.find(callback[, 'Rodrigo'])
			this.presupuesto.crubro =index.crubro
			this.presupuesto.nrubro =index.nrubro

		},
		searchPresupuesto(){
			var crubro=this.presupuesto.crubro
			var nrubro=""
			this.rubros.find(function(value, index) {
				if(value.crubro==crubro){
					crubro=value.crubro
					nrubro=value.nrubro
					console.log("nrubro", value.nrubro)
				}
			}
			)
			this.presupuesto.crubro= crubro
			this.presupuesto.nrubro=nrubro
		},
		GetBancos(cbanco){
			var vm = this
			if(cbanco==undefined){
				 fetch("api/bancos",{ //ruta
				 	credentials: 'include',
				 	type : "GET",
				 }).then(response => {
				 	return response.json()
				 }).then(bancos => {
				 	console.log(bancos)
				 	vm.bancos = bancos
				 });
				}
			},
			selectBanco(index){
				this.banco.cbanco =index.cbanco
				this.banco.nbanco=index.nbanco
				this.banco.numcuenta=index.numcuenta
				this.banco.idcuentas_bancos=index.idcuentas_bancos
			},
			createCheques:function(){
				this._token = $('form').find("input").val()
				this.cheque.valor=document.querySelector("#vCheque").value
				this.cheque.idcuentas_bancos=this.banco.idcuentas_bancos
				if(currencyFormat.sToN(this.cheque.valor)<this.terceroSelected.vtotal || currencyFormat.sToN(this.cheque.valor)>this.terceroSelected.vtotal){
					alertify.error('El valor del CHEQUE debe ser igual al valor a pagar')
				}else{
					var copycheque=Object.assign({},this.cheque)
					copycheque.valor=currencyFormat.sToN(copycheque.valor)
					console.log("copycheque")
					copycheque.cdatos=this.datos.cdatos
					var dato = $.param(copycheque)
					console.log(dato)
					if(this.datos.cdatos!=''){
						fetch("/cheques/create",{
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
								console.log(response.obj.id)
								this.cheque.idcheque=response.obj.id
								this.CreateDatosCuentas()
							}
						})
						.catch(function(error) {
							console.warn(error)
							alertify.error('Error al crear las cuentas')
						})
					}else{
						alertify.error('Los DATOS deben de estar creados')
					}
				}
			},
			CreateDatosCuentas(){
				this._token = $('form').find("input").val()
				if(this.datos.cdatos!='' && this.cheque.idcheque!=''){
					var datosCuentas=Object.assign({})
					datosCuentas.cdatos=this.datos.cdatos
					datosCuentas.idcheque=this.cheque.idcheque
					var dato = $.param(datosCuentas)
					console.log(dato)
					fetch("/datoscuentas/create",{
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
							this.cheque.idcheque=response.obj.id
						}
					})
					.catch(function(error) {
						console.warn(error)
						alertify.error('Error al crear los las cuentas')
					})
				}else{
					alertify.error('Los DATOS deben de estar creados o el CHEQUE debe de estar creado')
				}
			},
			createBanco(){
				this._token = $('form').find("input").val()
				var banco=Object.assign({})
				banco.nbanco=this.banco.nbanco
				banco.numcuenta=this.banco.numcuenta
				var dato = $.param(banco)
				console.log(dato)
				fetch("/banco/create",{
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
						console.log(response)
						this.banco.cbanco=response.obj.cbanco
						this.banco.numcuenta=response.obj.numcuenta
						this.banco.idcuentas_bancos=response.obj.idcuentas_bancos

					}
				})
				.catch(function(error) {
					console.warn(error)
					alertify.error('Error al crear los las cuentas')
				})
				this.GetBancos()
			},
			GetDatosEdit(){
				var vm = this
				 fetch("api/datosedit",{ //ruta
				 	credentials: 'include',
				 	type : "GET",
				 }).then(response => {
				 	return response.json()
				 }).then(datosEdit => {
				 	console.log(datosEdit)
				 	vm.datosEdit = datosEdit
				 	vm.datosEdit.forEach(function (item, index, array) {
				 		item.vtotal=currencyFormat.format(item.vtotal)
				 		//item.editar='<button onClick="this.openEdit()" class="btn btn-info">Editar</button>'

				 		item.editar='<a href="/?cdatos='+item.cdatos+'"'+'class="btn btn-info">Editar</a>'
				 		item.duplicar='<button class="btn btn-info ">Duplicar</button>'
				 	});
				 });
				},
				getUrlParameter(name) {
					name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
					var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
					var results = regex.exec(location.search);
					return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '))
				},
				checkQueryString(){
					var query = new URLSearchParams(window.location.search);

					console.log(query)
					var name= ''
					if (query.has('cdatos')) {
						var name= 'cdatos'
						var cdatos =this.getUrlParameter(name)
						console.log(cdatos)
					}
					
				},
				getDatosUpdate(cdatos){
					fetch("api/datosupdate?cdatos="+cdatos,{ //ruta
				 	credentials: 'include',
				 	type : "GET",
				 }).then(response => {
				 	return response.json()
				 }).then(datosEdit => {
				 	console.log(datos)
				 	});
				},
	},// end methods
	delimiters : ["[[","]]"],
	mounted (){
		$("#table").DataTable();
		var vm = this
		vm.datos.fpago=vm.date
		vm.datos.ffactu=vm.date
		vm.datos.festcomp=vm.date
		vm.datos.fdispo=vm.date
		vm.datos.fregis=vm.date
		vm.datos.vigencia=moment().locale('es').format('YYYY'),
		vm.GetRubros()
		vm.GetImpuestos()
		vm.GetTercero()
		vm.GetBancos()
		vm.GetDatosEdit()
		vm.checkQueryString()

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
	      //aca
	      var inputs = $(':input').keypress(function(e){
	      	if (e.which == 13) {
	      		e.preventDefault();
	      		var nextInput = inputs.get(inputs.index(this) + 1);
	      		if (nextInput) {
	      			nextInput.focus();
	      		}
	      	}
	      });
	      //aca

	  }
	})