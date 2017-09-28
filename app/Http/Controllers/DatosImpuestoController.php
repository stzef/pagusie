<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_impuestos;
use App\Models\Datos_basicos;
use App\Models\Impuestos;
use Illuminate\Support\Facades\Validator;
class DatosImpuestoController extends Controller
{
public function __construct(){
		$this->middleware('auth');
	}
 public function validar($data){
 $validator = Validator::make($data,
            [
            'cimpu'=>'required|exists:Impuestos,cimpu',
            'cdatos'=>'required|exists:Datos_basicos,cdatos',
            'vbase'=>'required|numeric',
            'porcentaje_Impuesto'=>'required|numeric',
            'vimpuesto'=>'required|numeric',
            ],
            [
            'cimpu.exists'=> 'El IMPUESTO no se encuentra en la base de datos',
            'cdatos.exists'=>'Los DATOS basicos no se encuentra en la base de datos',
            'cdatos.required'=>'Los DATOS basicos son requeridos',

            'vbase.numeric'=> 'El VALOR BASE debe ser un valor monetario',
            'vimpuesto.numeric'=> 'El VALOR DEL IMPUESTO debe ser un valor monetario',
            'porcentaje_Impuesto.numeric'=> 'El PORCENTAJE debe ser un valor numérico',
            ]
            );
 return $validator;
 }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
    	$data = $request->all();
    	
    	
    	//var_dump($validator);exit();
    		//var_dump($validator);
        if ($data['index']==0) {
            $DatosImpuesto=Datos_impuestos::where('cdatos',$data['cdatos'])->get();
            foreach ($DatosImpuesto as $key => $impuesto) {
                    $DatosImpuesto[$key]->delete();
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
    		$datos_impuesto = Datos_impuestos::create($data);
    	}
    	return response()->json(array("obj" => $datos_impuesto->toArray()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function show(Impuesto $impuestos, Request $request)
    {
    	if(!$request->cdatos){
    		$impuesto = Datos_impuestos::all();
    	}else{
    		$cdatos=$request->cdatos;
    		$impuesto = Datos_impuestos::where('cdatos',$cdatos)->get();
    	}
    	return response()->json($impuesto->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Impuesto $impuestos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impuesto $impuestos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impuesto $impuestos)
    {
        //
    }
}