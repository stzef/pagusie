<?php

namespace App\Http\Controllers;

use App\Models\Datos_cuentas;
use App\Models\Datos_basicos;
use App\Models\Cheques;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DatosCuentasController extends Controller
{
    public function validar($data){
       $validator=Validator::make($data,
        [
            'cdatos'=>'required|exists:datos_basicos,cdatos',
            'idcheque'=>'required|exists:cheques,idcheque',
        ],
        [
            'idcheque.exists'=>'El CHEQUE debe existir',
            'idcheque.required'=>'El CHEQUE es obligatorio',
            'cdatos.exists'=>'Los Datos debe existir',
            'cdatos.required'=>'Los Datos son obligatorio',

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
    public function create(Request $request)
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
            $datoscuentas = Datos_cuentas::create($data);

        }
        return response()->json(array("obj" => $datoscuentas->toArray()));
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
     * @param  \App\Models\Datos_cuentas  $datos_cuentas
     * @return \Illuminate\Http\Response
     */
    public function show(Datos_cuentas $datos_cuentas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos_cuentas  $datos_cuentas
     * @return \Illuminate\Http\Response
     */
    public function edit(Datos_cuentas $datos_cuentas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datos_cuentas  $datos_cuentas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datos_cuentas $datos_cuentas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datos_cuentas  $datos_cuentas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datos_cuentas $datos_cuentas)
    {
        //
    }
}
