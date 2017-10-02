<?php

namespace App\Http\Controllers;

use App\Models\Datos_basicos;
use App\Models\Tipo_documento;
use App\Models\Terceros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DatosBasicosController extends Controller
{
 public function __construct(){
    $this->middleware('auth');
}
public function convocatoriaFormat($data){
    $validator=Validator::make($data,
        ['convocatoria'=> 'nullable|integer|digits_between:1,4',
        ],[
        'convocatoria.integer'=> 'La CONVOCATORIA debe ser numérica',
        'convocatoria.digits_between'=> 'La CONVOCATORIA debe de tener de :min a :max dígitos',
        ]
        );
    if ($data['convocatoria']!=null) {
        if (!$validator->fails()) {
            $length=4-strlen($data['convocatoria']);
            $año=$data['vigencia'].'-';
            $convocatoria= str_pad($año, $length+5, "0").$data['convocatoria'];
            return $convocatoria;
        }else{
            $messages = $validator->messages();
            $message="";
            foreach ($messages->all() as $key) {
                $message.=" ".$key;
            }
            return response()->json(array("message"=>$message,"status"=>400),400);
        }
    }else{
     return null;
 }
}
public function validar($data){
 $validator=Validator::make($data,
    [
    'cterce'=>'required|exists:terceros,cterce',
    'ctidocumento'=>'required|exists:tipo_documento,ctidocumento',
    'cestado'=>'required|exists:estados,cestado',
    'vigencia'=>'required|integer',
    'fpago'=>'required|date_format:Y-m-d',
    'ffactu'=>'required|date_format:Y-m-d',
    'nfactu'=>'required|integer',
    'concepto'=>'required',
    'plazo'=>'required',
    'justificacion'=>'required',
    'festcomp'=>'required|date_format:Y-m-d',
    'fdispo'=>'required|date_format:Y-m-d',
    'vsiva'=>'required|numeric',
    'viva'=>'required|numeric',
    'vtotal'=>'required|numeric',
    'convocatoria'=> 'nullable|max:9|unique:Datos_basicos,convocatoria,'.$data['cdatos'].',cdatos',
    ],
    [
    'vigencia.integer'=> 'La VIGENCIA debe ser numérica',
    'convocatoria.integer'=> 'La CONVOCATORIA debe ser numérica',
    'convocatoria.max'=> 'La CONVOCATORIA no cumple con los parametros',
    'convocatoria.unique'=> 'La CONVOCATORIA ya esta utilizada',
    'convocatoria.digits_between'=> 'La CONVOCATORIA debe de tener de :min a :max dígitos',
    'cegre.integer'=>'El CÓDIGO COMPROBANTE EGRESO deber ser numérico',
    'cegre.unique'=>'Ya existe un registro con este CÓDIGO COMPROBANTE EGRESO',
    'nfactu.unique'=>'Ya existe un registro con este NÚMERO DE FACTURA',
    'vsiva.numeric'=> 'El VALOR SIN IVA debe ser un valor monetario',
    'viva.numeric'=> 'El VALOR CON IVA debe ser un valor monetario',
    'vtotal.numeric'=> 'El VALOR TOTAL debe ser un valor monetario',
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
       $data['convocatoria']=$this->convocatoriaFormat($data);
       $data['convocatoria']=$this->convocatoriaFormat($data);
       if (gettype($data['convocatoria'])=="object") {
         return $data['convocatoria'];
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
        $datos = Datos_basicos::create($data);
    }
    return response()->json(array("obj" => $datos->toArray()));
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
    public function show(Datos_basicos $datos_basicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Datos_basicos $datos_basicos)
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
    public function update(Request $request, Datos_basicos $datos_basicos)
    {
        $data = $request->all();
        $data['convocatoria']=$this->convocatoriaFormat($data);
        if (gettype($data['convocatoria'])=="object") {
         return $data['convocatoria'];
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
         // var_dump($data['convocatoria']);exit();
        $copydata=$data;
        unset($copydata['cdatos']);
        $datos = Datos_basicos::where('cdatos',$data['cdatos'])->update($copydata);
    }
    return response()->json(array("obj" => $datos));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datos_basicos  $datos_basicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datos_basicos $datos_basicos)
    {
        //
    }
}
