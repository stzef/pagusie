<?php

namespace App\Http\Controllers;

use App\Models\Bancos;
use App\Models\Cuentas_bancos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;
class BancoController extends Controller
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
            $bank=Bancos::where('nbanco',$data['nbanco'])->first();
            $cuentadatos= new Cuentas_bancos;
            if($bank==Null){
                $banco=Bancos::create($data);
                $banco->numcuenta=$data['numcuenta'];
                $cuentadatos->cbanco=$banco->cbanco;
                $cuentadatos->numcuenta=$data['numcuenta'];
                $cuentadatos->save();
            }else{
                if(Cuentas_bancos::where('numcuenta',$data['numcuenta'])->where('cbanco',$bank->cbanco)->first()==Null){
                $cuentadatos->cbanco=$bank->cbanco;
                $cuentadatos->numcuenta=$data['numcuenta'];
                $cuentadatos->save();
                }else{
                 return response()->json(array("message"=>"El número de cuenta ya se encuentra creado","status"=>400),400);
                }
            }

            //$cheque = Cheques::create($data);
        }
        return response()->json(array("obj" => $cuentadatos->toArray()));
    }
    //var_dump(Bancos::where('nbanco',$data['nbanco'])->first());exit();


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
     * @param  \App\Models\Bancos  $bancos
     * @return \Illuminate\Http\Response
     */
    public function show(Bancos $bancos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bancos  $bancos
     * @return \Illuminate\Http\Response
     */
    public function edit(Bancos $bancos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bancos  $bancos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bancos $bancos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bancos  $bancos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bancos $bancos)
    {
        //
    }
}
