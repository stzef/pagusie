<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_basicos;
use App\Models\Terceros;
use App\Models\Colegio;
use App\Models\Impuestos;
use App\Models\Datos_presupuesto;
use PDF;
use App\Helper\Helper;
use App\Helper\NumeroALetras;

class ComprobanteEgresoController extends Controller
{
	public function pdf(Request $request ){
		$cdatos = $request->input('cdatos');
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$impuestos=Impuestos::all();
		$rubros=Datos_presupuesto::where('cdatos',$cdatos)->get();
		$colegio=Colegio::all()->first();
		$datos->vsiva_letras=NumeroALetras::convertir($datos->vsiva,'pesos').' M/CTE.';
		$datos->viva_letras=NumeroALetras::convertir($datos->viva,'pesos').' M/CTE.';
		$datos->vtotal_letras=NumeroALetras::convertir($datos->vtotal,'pesos').' M/CTE.';

		$datos->ffactu=Helper::formatDate($datos->ffactu,1);
		//var_dump($datos->ffactu);exit();
		$datos->fpago=Helper::formatDate($datos->fpago,0);
		$datos->festcomp=Helper::formatDate($datos->festcomp,0);
		$datos->fdispo=Helper::formatDate($datos->fdispo,0);
		$datos->fregis=Helper::formatDate($datos->fregis,0);
		$tercero=$datos->tercero;
		$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"impuestos"=>$impuestos,"rubros"=>$rubros,);
		//return view('pdf.comprobante_egreso', $data);
		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		$pdf = PDF::loadView('pdf.comprobante_egreso', $data);
		return $pdf->setPaper('a4')->stream();
	}
}
