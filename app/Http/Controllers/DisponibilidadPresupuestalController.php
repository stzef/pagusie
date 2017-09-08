<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports\Reporte_disponibilidad_presupuestal;
use App\Models\Datos_basicos;
use App\Models\Colegio;
use App\Models\Datos_presupuesto;
use PDF;
use App\Helper\Helper;
use App\Helper\NumeroALetras;
class DisponibilidadPresupuestalController extends Controller
{
    public function pdf(Request $request ){
		$cdatos = $request->input('cdatos');
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$rubros=Datos_presupuesto::where('cdatos',$cdatos)->get();
		$colegio=Colegio::all()->first();
		$datos->fdispo=Helper::formatDate($datos->fdispo,0);

		if (!Reporte_disponibilidad_presupuestal::where("cdatos",$cdatos)->first()){
			$reporteDP=Reporte_disponibilidad_presupuestal::create(["cdatos"=>$datos->cdatos]);
		}else{
			$reporteDP=Reporte_disponibilidad_presupuestal::where("cdatos",$cdatos)->first();
		}

		$data = array("datos" => $datos,"colegio"=>$colegio,"rubros"=>$rubros,"reporte"=>$reporteDP);
		//return view('pdf.comprobante_egreso', $data);

		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		$pdf = PDF::loadView('pdf.disponibilidad_presupuestal', $data);
		return $pdf->setPaper('a4')->stream();
	}
}
