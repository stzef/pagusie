<?php

namespace App\Http\Controllers;

use App\Models\Cheques;
use App\Models\Cuentas_bancos;
use App\Models\Datos_cuentas;
use App\Models\Estados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChequesController extends Controller
{
    public function validar($data){
       $validator=Validator::make($data,
        [
            'idcuentas_bancos'=>'required|exists:cuentas_bancos,idcuentas_bancos',
            'cestado'=>'required|exists:estados,cestado',
            'numcheque'=>'required|integer',
            'concepto'=>'required',
            'valor'=>'required|numeric',

        ],
        [
            'numcheque.integer'=>'El NÚMERO DEL CHEQUE deber ser numérico',
            'numcheque.required'=>'El NÚMERO DEL CHEQUE es obligatorio',
            'numcheque.unique'=>'El NÚMERO DEL CHEQUE fue utilizado',
            'concepto.required'=>'El CONCEPTO es obligatorio',
            'valor.numeric'=> 'El VALOR  debe ser un valor monetario',
            'valor.required'=> 'El VALOR es obligatorio',
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
     $idcheque=Cheques::where('numcheque',$data['numcheque'])->where('idcuentas_bancos',$data['idcuentas_bancos'])->first()['idcheque'];
//var_dump($idcheque);exit();
     if ($idcheque!=Null) {
        return response()->json(array("message"=>"El CHEQUE no se puede duplicar","status"=>400),400);
    }
    if(Datos_cuentas::where('idcheque',$idcheque)->first()!=Null){
        return response()->json(array("message"=>"El CHEQUE ya esta utilizado","status"=>400),400);
    }
    if(Datos_cuentas::where('cdatos',$data['cdatos'])->first()!=Null){
        return response()->json(array("message"=>"La cuenta ya fue pagada","status"=>400),400);
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
        $cheque = Cheques::create($data);
    }
    return response()->json(array("obj" => $cheque->toArray()));
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
     * @param  \App\Models\Cheques  $cheques
     * @return \Illuminate\Http\Response
     */
    public function show(Cheques $cheques)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cheques  $cheques
     * @return \Illuminate\Http\Response
     */
    public function edit(Cheques $cheques)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cheques  $cheques
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cheques $cheques)
    {
     $data = $request->all();
     $cheque=Cheques::where('idcuentas_bancos',$data['idcuentas_bancos'])->get();
     foreach ($cheque as $key => $cheq) {
         if ($cheq->numcheque==$data['numcheque'] && $cheq->idcheque!=$data['idcheque']) {
            return response()->json(array("message"=>"El NÚMERO DEl CHEQUE no se puede repetir","status"=>400),400);
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
        $copycheque=$data;
        //var_dump($data);exit();
        unset($copycheque['cdatos']);
        $datos = Cheques::where('idcheque',$data['idcheque'])->update($copycheque);
    }
    return response()->json(array("obj" => $datos));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cheques  $cheques
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cheques $cheques)
    {
        //
    }
}
