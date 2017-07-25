<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_basicos;
use App\Models\Terceros;
use App\Models\Colegio;
use PDF;

class DocumentoEquivalenteController extends Controller
{
	public function pdf(Request $request ){
		$cdatos = $request->input('cdatos');
		// var_dump($cdatos);exit();
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		
		$colegio=Colegio::all()->first();

		$tercero=$datos->tercero;
		$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,);
		\PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		$pdf = PDF::loadView('pdf.documento_equivalente', $data);
		return $pdf->setPaper('a4')->stream();
	}
}
