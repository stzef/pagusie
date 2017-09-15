<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impuestos;


class ImpuestoController extends Controller
{
	public function __construct(){
		$this->middleware('auth',);
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
    /*public function show(Impuestos $impuestos, Request $request)
    {
    	if(!$request->cimpu){
    		$impuestos = Impuestos::all();
    	}else{
    		$cimpu=$request->cimpu;
    		$impuestos = Impuestos::where('cimpu',$cimpu)->get();
    	}
    	return response()->json($impuestos->toArray());
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Impuestos $impuestoss)
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
    public function update(Request $request, Impuestos $impuestoss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impuestos $impuestoss)
    {
        //
    }
}



