<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Unidades;
use App\Models\Contratos;
use App\Models\Contrato_articulo_detalle;
use App\Helper\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SuministrosController extends Controller
{
	public function validar($data){
		$validator=Validator::make($data,
			[
				'ccontra'=>'required|exists:Contratos,ccontra',
				'carti'=>'required|integer|exists:Articulos,carti',
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
				'centrada.max'=> 'El CÓDIGO DE ENTRADA no cumple con los parametros',
				
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
    	$data = $request->all();
        $data['centrada']=Helper::centradaFormat($data);
    	if (gettype($data['centrada'])=="object") {
    		return $data['centrada'];
    	}
    	if ($data['index']==0) {
    		$Suministros=Contrato_articulo_detalle::where('ccontra',$data['ccontra'])->get();
    		foreach ($Suministros as $key => $Suministro) {
    			$Suministros[$key]->delete();
    		}
    	}
    	$validator = $this->validar($data);
    	if ($validator->fails()){
    		$messages = $validator->messages();
    		$message="";
    		foreach ($messages->all() as $key) {
    			$message.=" ".$key;
    		}
    		return response()->json(array("message"=>$message,"status"=>400),400);
    	}else{
    		$suministro = Contrato_articulo_detalle::create($data);
    	}
    	return response()->json(array("obj" => $suministro->toArray()));
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
