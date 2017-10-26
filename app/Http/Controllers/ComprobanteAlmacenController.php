<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Datos_basicos;
use App\Models\Colegio;
use App\Models\Datos_presupuesto;
use PDF;
use App\Helper\Helper;
use App\Helper\NumeroALetras;
use App\Models\Reports\Reporte_comprobante_entrada_almacen;
use App\Models\Reports\Reporte_comprobante_salida_almacen;
class ComprobanteAlmacenController extends Controller
{
     public function pdfEntrada(Request $request ){
		$cdatos = $request->input('cdatos');
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));

		$colegio=Colegio::all()->first();
		$datos->vtotal_letras=NumeroALetras::convertir($datos->vtotal,'pesos').' M/CTE.';
		$datos->ffactu=Helper::formatDate($datos->ffactu,1);
		$datos->fpago=Helper::formatDate($datos->fpago,0);
		$datos->festcomp=Helper::formatDate($datos->festcomp,0);
		$datos->fdispo=Helper::formatDate($datos->fdispo,0);
		$datos->fregis=Helper::formatDate($datos->fregis,0);
		$tercero=$datos->tercero;
		$rubros=Datos_presupuesto::where('cdatos',$cdatos)->get();
		$contrato=$datos->contrato;
		$vtotalsumi=0;
		if ($contrato!=null) {
			$suministros=$contrato->contratoArticuloDetalles->all();
			foreach ($suministros as $key => $suministro) {
				$vtotalsumi+=$suministro->vtotal;
			}
		}else{
			$suministros=[];
		}
		$datos->vtotalsumi=$vtotalsumi;
		if (!Reporte_comprobante_entrada_almacen::where("cdatos",$cdatos)->first()){
			$reporteCEA=Reporte_comprobante_entrada_almacen::create(["cdatos"=>$datos->cdatos]);
		}else{
			$reporteCEA=Reporte_comprobante_entrada_almacen::where("cdatos",$cdatos)->first();
		}
		$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"rubros"=>$rubros,"reporte"=>$reporteCEA,"suministros"=>$suministros,);
		//$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"rubros"=>$rubros,);
		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif','defaultSize'=> '12',]);
		$pdf = PDF::loadView('pdf.comprobante_entrada', $data);
		return $pdf->setPaper('a4')->stream();
	}
	public function pdfSalida(Request $request ){
		$cdatos = $request->input('cdatos');
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));

		$colegio=Colegio::all()->first();
		$datos->vtotal_letras=NumeroALetras::convertir($datos->vtotal,'pesos').' M/CTE.';
		$datos->ffactu=Helper::formatDate($datos->ffactu,1);
		$datos->fpago=Helper::formatDate($datos->fpago,0);
		$datos->festcomp=Helper::formatDate($datos->festcomp,0);
		$datos->fdispo=Helper::formatDate($datos->fdispo,0);
		$datos->fregis=Helper::formatDate($datos->fregis,0);
		$tercero=$datos->tercero;
		$rubros=Datos_presupuesto::where('cdatos',$cdatos)->get();
		$contrato=$datos->contrato;
		$vtotalsumi=0;
		if ($contrato!=null) {
			$suministros=$contrato->contratoArticuloDetalles->all();
			foreach ($suministros as $key => $suministro) {
				$vtotalsumi+=$suministro->vtotal;
			}
		}else{
			$suministros=[];
		}
		$datos->vtotalsumi=$vtotalsumi;
		if (!Reporte_comprobante_salida_almacen::where("cdatos",$cdatos)->first()){
			$reporteCSA=Reporte_comprobante_salida_almacen::create(["cdatos"=>$datos->cdatos]);
		}else{
			$reporteCSA=Reporte_comprobante_salida_almacen::where("cdatos",$cdatos)->first();
		}
		$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"rubros"=>$rubros,"reporte"=>$reporteCSA,"suministros"=>$suministros,);
		//$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"rubros"=>$rubros,);
		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif','defaultSize'=> '12',]);
		$pdf = PDF::loadView('pdf.comprobante_salida', $data);
		return $pdf->setPaper('a4')->stream();
	}
}
