<?php

namespace App\Http\Controllers;

use App\Models\Terceros;
use App\Models\Departamentos;
use App\Models\Ciudades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TercerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('terceros');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $data = $request->all();
       $validator = Validator::make($data,
        [
        'cciud'=>'required|exists:ciudades,cciud',
        'nit'=>'required|integer|unique:terceros',
        'nombre'=>'required',
        'telefono'=>'required|integer',
        'direccion'=>'required',
        'email'=>'required',
        ],
        [
        'nit.required' => 'El NIT es obligatorio',
        'nit.integer' => 'El NIT debe ser numérico',
        'nit.unique' => 'Ya existe un tercero con este NIT',
        'telefono.integer' => 'El TELÉFONO debe ser numérico',
        'direccion.required' => 'required',
        'email.required' => 'required',
        ]
        );

       if ($validator->fails()){
        $messages = $validator->messages();
        $message="";
        foreach ($messages->all() as $key) {
            if ($key[0]){
            $message.=$key.". ";
        }else{
            $message.=". ".$key;
        }
        }
        return response()->json(array("message"=>$message,"status"=>400),400);
    }else{
        $tercero = Terceros::create($data);
    }
    return response()->json(array("obj" => $tercero->toArray()));
    } //


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
     * @param  \App\Models\Terceros  $terceros
     * @return \Illuminate\Http\Response
     */
    public function show(Terceros $terceros, Request $request)
    {
        if(!$request->cterce){
            $terceros=Terceros::all();
        }else{
            $cterce=$request->cterce;
            $impuestos = Terceros::where('cterce',$cterce)->get();
        }
        return response()->json($terceros->toArray());
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terceros  $terceros
     * @return \Illuminate\Http\Response
     */
    public function edit(Terceros $terceros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terceros  $terceros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terceros $terceros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terceros  $terceros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terceros $terceros)
    {
        //
    }
}
