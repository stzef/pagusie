<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports\Reporte_registro_presupuestal;
use App\Models\Datos_basicos;
use App\Models\Colegio;
use App\Models\Terceros;
use App\Models\Datos_presupuesto;
use PDF;
use App\Helper\Helper;


class RegistroPresupuestalController extends Controller
{
    public function pdf(Request $request ){
		$cdatos = $request->input('cdatos');
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$rubros=Datos_presupuesto::where('cdatos',$cdatos)->get();
		$colegio=Colegio::all()->first();
		$datos->fdispo=Helper::formatDate($datos->fdispo,0);
		$datos->fregis=Helper::formatDate($datos->fregis,0);
		$tercero=$datos->tercero;
		if (!Reporte_registro_presupuestal::where("cdatos",$cdatos)->first()){
			$reporteRP=Reporte_registro_presupuestal::create(["cdatos"=>$datos->cdatos]);
		}else{
			$reporteRP=Reporte_registro_presupuestal::where("cdatos",$cdatos)->first();
		}

		$data = array("datos" => $datos,"colegio"=>$colegio,"rubros"=>$rubros,"reporte"=>$reporteRP,"tercero"=>$tercero);
		//return view('pdf.comprobante_egreso', $data);

		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		$pdf = PDF::loadView('pdf.registro_presupuestal', $data);
		return $pdf->setPaper('a4')->stream();
	}
}
