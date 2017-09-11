<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_basicos;
use App\Models\Colegio;
use App\Models\Datos_presupuesto;
use PDF;
use App\Helper\Helper;
use App\Helper\NumeroALetras;
//use App\Models\Reports\Reporte_contrato_prestacion_servicio;

class ContratoSuministroController extends Controller
{
    public function pdf(Request $request ){
		$cdatos = $request->input('cdatos');
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));

		$colegio=Colegio::all()->first();
		$datos->vtotal_letras=NumeroALetras::convertir($datos->vtotal,'pesos').' M/CTE.';
		$datos->ffactu=Helper::formatDate($datos->ffactu,0);
		$datos->fpago=Helper::formatDate($datos->fpago,0);
		$datos->festcomp=Helper::formatDate($datos->festcomp,0);
		$datos->fdispo=Helper::formatDate($datos->fdispo,0);
		$datos->fregis=Helper::formatDate($datos->fregis,0);
		$tercero=$datos->tercero;
		$rubros=Datos_presupuesto::where('cdatos',$cdatos)->get();
		/*if (!Reporte_contrato_prestacion_servicio::where("cdatos",$cdatos)->first()){
			$reporteCS=Reporte_contrato_prestacion_servicio::create(["cdatos"=>$datos->cdatos]);
		}else{
			$reporteCS=Reporte_contrato_prestacion_servicio::where("cdatos",$cdatos)->first();
		}
		$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"rubros"=>$rubros,"reporte"=>$reporteCS);*/
		$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"rubros"=>$rubros,);
		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif','defaultSize'=> '12',]);
		$pdf = PDF::loadView('pdf.contrato_suministros', $data);
		return $pdf->setPaper('a4')->stream();
	}
}
