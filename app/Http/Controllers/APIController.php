<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_documento;
use App\Models\Departamentos;
use App\Models\Ciudades;
use App\Models\Presupuesto;
use App\Models\Impuestos;
use App\Models\Terceros;
use App\Models\Datos_basicos;
use App\Models\Datos_presupuesto;
use App\Models\Datos_impuestos;
use App\Models\Datos_cuentas;
use App\Models\Bancos;
use App\Models\Cuentas_bancos;
use App\Models\Articulos;
use App\Models\Unidades;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;
use stdClass;
use ArrayObject;
class APIController extends Controller
{
/*
public function __construct(){
    $this->middleware('auth');
}*/
public function tipo_documento(){
	$tidocumentos = Tipo_documento::all();
	return response()->json($tidocumentos->toArray());

}

public function departamentos(){
	$departamentos = Departamentos::all();
	return response()->json($departamentos->toArray());

}

public function ciudades(Request $request){
	if(!$request->cdepar){
		$ciudades = Ciudades::all();
	}else{
		$cdepar=$request->cdepar;
		$ciudades = Ciudades::where('cdepar',$cdepar)->get();
	}
	return response()->json($ciudades->toArray());

}

public function impuestos(Request $request){
	if(!$request->cimpu){
		$impuestos = Impuestos::all();
	}else{
		$cimpu=$request->cimpu;
		$impuestos = Impuestos::where('cimpu',$cimpu)->get();
	}
	return response()->json($impuestos->toArray());

}

public function terceros(Request $request){
	if(!$request->cterce){
		$terceros=Terceros::all();
	}else{
		$cterce=$request->cterce;
		$terceros = Terceros::where('cterce',$cterce)->get();
	}
	return response()->json($terceros->toArray());

}

public function presupuestos(Request $request){
		//var_dump($user);
	if(!$request->crubro){
		$presupuesto = Presupuesto::all();
	}else{
		$crubro=$request->crubro;
		$presupuesto = Presupuesto::where('crubro',$crubro)->get();
	}
	return response()->json($presupuesto->toArray());

}
public function comprobanteegreso(Request $request){
	if($request->cegre){
		$cegre=$request->cegre;
		if (sizeof(Datos_basicos::where('cegre',$cegre)->get())>0){
			return response()->json(true);
		}
		else{
			return response()->json(false);
		}
	}
}
public function bancos(Request $request){
	if(!$request->cbanco){
		$cuentas = Cuentas_bancos::all();
		$bancos = collect();
		foreach ($cuentas as $cuenta) {
			$temp=$cuenta;
			$temp->nbanco=$cuenta->banco->nbanco;
			$bancos->push($temp);
		}
	}else{
		$crubro=$request->crubro;
		$banco = Bancos::where('crubro',$crubro)->get();
		$bancos = collect();
		foreach ($banco as $cuentas) {
			$temp=$cuentas;
			$temp->numcuenta=$cuentas->cuentasbancos[0]->numcuenta;
			$bancos->push($temp);
		}
	}
	return response()->json($bancos->toArray());
}
public function datosEdit(Request $request){
	$datos=Datos_basicos::all();
	//$datos->tercero=$datos->tercero;
	foreach ($datos as $key => $dato) {
		$tercero=$dato->tercero->nombre;
		$dato->tercero=$tercero;
	}
	return response()->json($datos->toArray());
}
public function datosUpdate(Request $request){
	$cdatos=$request->cdatos;
	if ( !$cdatos ) return view('errors/generic',array('title' => 'Error.', 'message' => "El registro $cdatos no existe" ));
	$datos=Datos_basicos::where('cdatos',$cdatos)->first();
	if ( !$datos ) return view('errors/generic',array('title' => 'Error.', 'message' => "El registro $cdatos no existe" ));
	$datos=Datos_basicos::where('cdatos',$cdatos)->first();
	$datos->convocatoria=Helper::convocatoriaToN($datos->convocatoria);
	$datos->tercero=$datos->tercero;
	$presupuesto=Datos_presupuesto::where('cdatos',$cdatos)->get();
	foreach ($presupuesto as $key => $presu) {
		$presupuesto->presupuestos=$presu->presupuesto;
	}
	$impuesto=Datos_impuestos::where('cdatos',$cdatos)->get();
	foreach ($impuesto as $key => $impu) {
		$impuesto->impuestos=$impu->impuesto;
	}
	$cuenta=Datos_cuentas::where('cdatos',$cdatos)->get();
	foreach ($cuenta as $key => $cuen) {
		$cuenta->cheques=$cuen->cheque;
		$cuenta->cuentabanco=$cuen->cheque->cuentasbanco;
		$cuenta->bancos=$cuen->cheque->cuentasbanco->banco;
	}
	//var_dump($cuenta->bancos);exit();
	$datos->presupuesto=$presupuesto;
	$datos->impuesto=$impuesto;
	$datos->cuenta=$cuenta;
	$datos->contrato=$datos->contrato;
	return response()->json($datos->toArray());
}
public function getListConvocatoria(Request $request){
	$vigencia=$request->vigencia;
	$convocatorias=Datos_basicos::where('vigencia',$vigencia)->where('convocatoria','!=','')->get();
	$max=Helper::convocatoriaToN($convocatorias->max(['convocatoria']));
	$data= new Datos_basicos;
	$array=[];
	$arrayobj = new ArrayObject;
	for ($i=1; $i <=$max ; $i++) { 
		$datasend= new stdClass;
		$data->vigencia=$vigencia;
		$data->convocatoria=$i;
		$data->tercero='';
		$convocatoriaok=Helper::convocatoriaSimpleFormat($data);
		if (count($convocatorias->where('convocatoria',$convocatoriaok))>0) {
			$datos=$convocatorias->where('convocatoria',$convocatoriaok)->first();
			$ntercero=$datos->tercero->nombre;
			$data->tercero=$ntercero;
		}
		$datasend->vigencia=$data->vigencia;
		$datasend->convocatoria=$data->convocatoria;
		$datasend->tercero=$data->tercero;
		array_push($array,$datasend);
		
	}
	return response()->json($array);
}
public function getArticulos(Request $request){
	$articulos=Articulos::all();
	foreach ($articulos as $key => $articulo) {
		$articulos->unidades=$articulo->unidad;
	}
	return response()->json($articulos);
}
public function getUnidades(Request $request){
	$unidades=Unidades::all();
	return response()->json($unidades);
}
}

