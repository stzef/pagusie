<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Unidades;
use App\Models\Contratos;
use App\Models\Contrato_articulo_detalle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SuministrosController extends Controller
{
	public function validar($data){
		$validator=Validator::make($data,
			[
				'ccontra'=>'required|exists:Contratos,ccontra',
				'carti'=>'required|integer|exists:Articulo,carti',
				'canti'=>'required|integer',
				'vunita'=>'required|numeric',
				'vtotal'=>'required|numeric',
				'centrada'=> 'required|max:13',

			],
			[
				'canti.integer'=>'La CANTIDAD debe ser numérico',
				'canti.required'=>'La CANTIDAD debe es obligatoria',
				'vunita.required'=>'El VALOR UNITARIO es obligatorio',
				'vunita.numeric'=>'El VALOR UNITARIO debe ser un valor monetario',
				'vtotal.required'=>'El VALOR TOTAL es obligatorio',
				'vtotal.numeric'=>'El VALOR TOTAL debe ser un valor monetario',
				'convocatoria.max'=> 'El CÓDIGO DE ENTRADA no cumple con los parametros',
				
			]
		);
		return $validator;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$$data = $request->all();
		$centrada=Contrato_articulo_detalle::all()->max(['centrada']);
    	var_dump($centrada);exit();

    	$data['centrada']=Helper::centradaFormat($data);
    	if (gettype($data['convocatoria'])=="object") {
    		return $data['convocatoria'];
    	}
    }
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
