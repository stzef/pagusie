<?php

namespace App\Http\Controllers;
use App\Models\Datos_basicos;
use App\Models\Tipo_contrato;
use App\Models\Contratos;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\Support\Facades\Validator;

class ContratoController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function validar($data){
		$validator=Validator::make($data,
			[
				'cdatos'=>'required|integer|exists:datos_basicos,cdatos|unique:contratos,ccontra',
				'cticontrato'=>'required|integer|exists:Tipo_contrato,cticontrato',
				'fecha'=>'required|date_format:Y-m-d',
				'vttotal'=>'required|numeric',
			],
			[
				'cdatos.exists'=> 'Los DATOS BASICOS no existen en la base de datos',
				'cdatos.unique'=> 'No se puede tener dos contratos en una cuenta',
				'cticontrato.exists'=> 'El CONTRATO no existen en la base de datos',
				'vttotal.numeric'=> 'El VALOR debe ser un valor monetario',
			]
		);
		return $validator;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
    	$data = $request->all();
    	$validator = $this->validar($data);
    	if ($validator->fails()){
    		$messages = $validator->messages();
    		$message="";
    		foreach ($messages->all() as $key) {
    			$message.=" ".$key;
    		}
    		return response()->json(array("message"=>$message,"status"=>400),400);
    	}else{
    			$contrato = Contratos::create($data);
    	}
    	return response()->json(array("obj" => $contrato->toArray()));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$data = $request->all();
    	$validator = $this->validar($data);
    	if ($validator->fails()){
    		$messages = $validator->messages();
    		$message="";
    		foreach ($messages->all() as $key) {
    			$message.=" ".$key;
    		}
    		return response()->json(array("message"=>$message,"status"=>400),400);
    	}else{
         // var_dump($data['convocatoria']);exit();
    		$copydata=$data;
    		unset($copydata['ccontra']);
    		$contrato =Contratos::where('ccontra',$data['ccontra'])->update($copydata);
    	}
    	return response()->json(array("obj" => $contrato));
    }

}
