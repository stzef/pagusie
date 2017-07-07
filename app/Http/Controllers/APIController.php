<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_documento;
use App\Models\Departamentos;
use App\Models\Ciudades;

class APIController extends Controller
{
    //
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
}

