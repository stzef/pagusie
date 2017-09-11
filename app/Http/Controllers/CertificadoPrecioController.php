<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_basicos;
use App\Models\Colegio;
use App\Models\Datos_presupuesto;
use PDF;
use App\Helper\Helper;
use App\Helper\NumeroALetras;
use App\Models\Reports\Reporte_certificado_precio;


class CertificadoPrecioController extends Controller
{
	public function pdf(Request $request ){
		$cdatos = $request->input('cdatos');
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));

		$colegio=Colegio::all()->first();
		$datos->festcomp=Helper::formatDate($datos->festcomp,0);
		if (!Reporte_certificado_precio::where("cdatos",$cdatos)->first()){
			$reporteCP=Reporte_certificado_precio::create(["cdatos"=>$datos->cdatos]);
		}else{
			$reporteCP=Reporte_certificado_precio::where("cdatos",$cdatos)->first();
		}

		$data = array("datos" => $datos,"colegio"=>$colegio,"reporte"=>$reporteCP,);
		//return view('pdf.comprobante_egreso', $data);

		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		$pdf = PDF::loadView('pdf.certificado_precios_mercado', $data);
		return $pdf->setPaper('a4')->stream();
	}
}
