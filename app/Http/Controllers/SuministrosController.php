<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Unidades;
use App\Models\Contrato_articulo_detalle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SuministrosController extends Controller
{
	public function validar($data){
		$validator=Validator::make($data,
			[
				'nbanco'=>'required',
				'numcuenta'=>'required|integer',
			],
			[
				'numcuenta.integer'=>'El NÚMERO DE LA CUENTA deber ser numérico',
				'numcuenta.required'=>'El NÚMERO DE LA CUENTA es obligatorio',
				'nbanco.required'=>'El nombre del BANCO es obligatorio',
			]
		);
		return $validator;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUnidad(Request $request)
    {
    	$data = $request->all();
    	$unidades=Unidades::where('nunidad',$data['nunidad'])->first();
    	if($unidades!=Null){
    		return response()->json(array("message"=>"La Unidad Ya Esta Creada","status"=>400),400);
    	}else{
    		$unidad=Unidades::create($data);
    		return response()->json(array("obj" => $unidad->toArray()));
    	}
    }
}
