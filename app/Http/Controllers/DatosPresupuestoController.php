<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_presupuesto;
use App\Models\Datos_basicos;
use App\Models\Presupuesto;
use Illuminate\Support\Facades\Validator;

class DatosPresupuestoController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    public function validar($data){
        $validator = Validator::make($data,
            [
              'crubro'=>'required|exists:Presupuesto,crubro',
              'cdatos'=>'required|exists:Datos_basicos,cdatos',
              'valor'=>'required|numeric',
          ],
          [
              'crubro.exists'=> 'El RUBRO no se encuentra en la base de datos',
              'cdatos.exists'=>'Los DATOS basicos no se encuentra en la base de datos',
              'cdatos.required'=>'Los DATOS basicos son requeridos',

              'valor.numeric'=> 'El VALOR debe ser un valor monetario',
          ]
      );
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
     
        $DatosPresupuesto=Datos_presupuesto::where('cdatos',$data['cdatos'])->get();
       foreach ($DatosPresupuesto as $key => $presupuesto) {
            if ($presupuesto->crubro==$data['crubro']) {
                return response()->json(array("message"=>"El rubro ".$presupuesto->presupuesto->nrubro." ya se encuentra gurdado ","status"=>400),400);
            }
        }exit();
        $validator = $this->validar($data);
        if ($validator->fails()){
          $messages = $validator->messages();
          $message="";
          foreach ($messages->all() as $key) {
             $message.=" ".$key;
         }
         return response()->json(array("message"=>$message,"status"=>400),400);
     }else{
      $datos_presupuesto = Datos_presupuesto::create($data);
  }
  return response()->json(array("obj" => $datos_presupuesto->toArray()));
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
    public function show(Presupuesto $presupuestos, Request $request)
    {
    	if(!$request->cdatos){
    		$presupuesto = Datos_presupuesto::all();
    	}else{
    		$cdatos=$request->cdatos;
    		$presupuesto = Datos_presupuesto::where('cdatos',$cdatos)->get();
    	}
    	return response()->json($presupuesto->toArray());
    }
    public function count(Presupuesto $presupuestos, Request $request)
    {
        if(!$request->cdatos){
            $presupuesto = Datos_presupuesto::all();
        }else{
            $cdatos=$request->cdatos;
            $presupuesto = Datos_presupuesto::where('cdatos',$cdatos)->get();
        }
        return count($presupuesto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuestos)
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
    public function update(Request $request, Presupuesto $presupuestos)
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
            $copydata=$data;
            unset($copydata['iddatos_presupuesto']);
            $datos = Datos_basicos::where('iddatos_presupuesto',$data['iddatos_presupuesto'])->update($copydata);
        }
        return response()->json(array("obj" => $datos));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $presupuestos)
    {
        //
    }
}