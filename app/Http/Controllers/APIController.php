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
use Illuminate\Support\Facades\Auth;
class APIController extends Controller
{


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

}

