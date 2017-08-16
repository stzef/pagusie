<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_basicos;
use App\Models\Terceros;
use App\Models\Colegio;
use PDF;
use App\Helper\Helper;
use App\Helper\NumeroALetras;


class DocumentoEquivalenteController extends Controller
{
	public function pdf(Request $request ){
		$cdatos = $request->input('cdatos');
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));

		$colegio=Colegio::all()->first();

		$datos->vtotal_letras=NumeroALetras::convertir($datos->vtotal,'pesos').' M/CTE.';
		$datos->fpago=Helper::formatDate($datos->fpago,0);
		$datos->ffactu=Helper::formatDate($datos->ffactu,0);
		$datos->festcomp=Helper::formatDate($datos->festcomp,0);
		$datos->fdispo=Helper::formatDate($datos->fdispo,0);
		$datos->fregis=Helper::formatDate($datos->fregis,0);
		$tercero=$datos->tercero;
		$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,);
		//return view('pdf.documento_equivalente', $data);
		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		$pdf = PDF::loadView('pdf.documento_equivalente', $data);
		return $pdf->setPaper('a4')->stream();
	}


}
