<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports\Reporte_recibo_satisfaccion;
use App\Models\Datos_basicos;
use App\Models\Terceros;
use App\Models\Colegio;
use App\Helper\Helper;

use PDF;

class ReciboSatisfaccionController extends Controller
{
	public function pdf(Request $request ){
	$cdatos = $request->input('cdatos');
	if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
	if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
	$colegio=Colegio::all()->first();
	$tercero=$datos->tercero;
	$datos->fpago=Helper::formatDate($datos->fpago,1);

	/*if (!Reporte_recibo_satisfaccion::where("cdatos",$cdatos)->first()){
			$reporteRS=Reporte_recibo_satisfaccion::create("cdatos"=>$datos->cdatos);
	}else{
			$reporteRS=Reporte_recibo_satisfaccion::where("cdatos",$cdatos)->first();
	}*/

	//$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"reporte"=>$reporteRS);
	$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio);

		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		$pdf = PDF::loadView('pdf.recibo_satisfaccion', $data);
		return $pdf->setPaper('a4')->stream();
    }
}
