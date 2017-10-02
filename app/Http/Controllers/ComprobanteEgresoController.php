<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports\Reporte_comprobante_egreso;
use App\Models\Datos_basicos;
use App\Models\Terceros;
use App\Models\Colegio;
use App\Models\Impuestos;
use App\Models\Datos_presupuesto;
use App\Models\Datos_impuestos;
use App\Models\Datos_cuentas;
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
		$datos_impuestos=Datos_impuestos::where('cdatos',$cdatos)->get();
		$cheque=$datos->datoscuentas->first()->cheque->first();
		$cuentasbanco=$cheque->cuentasbanco;
		$datos->numcheque=$cheque->numcheque;
		$datos->numcuenta=$cuentasbanco->numcuenta;
		$datos->nbanco=$cuentasbanco->banco->nbanco;
		$vtdedu=0;
		foreach ($impuestos as $key => $impuesto) {
			foreach ($datos_impuestos as $key2 => $dimpuesto) {
				if($impuesto->cimpu==$dimpuesto->cimpu){
					$vtdedu=$vtdedu+$dimpuesto->vimpuesto;
					$impuestos[$key]->porcentajeImpuesto=$dimpuesto->porcentaje_Impuesto;
					$impuestos[$key]->valor=($impuesto->porcentajeImpuesto/100)*$datos->vtotal;
				}
			}
		}
		$datos->vtdeduc=$vtdedu;
		$datos->vneto=$datos->vtotal-$vtdedu;
		if (!Reporte_comprobante_egreso::where("cdatos",$cdatos)->first()){
			$reporteCE=Reporte_comprobante_egreso::create(["cdatos"=>$datos->cdatos,"vtdeduc"=>$datos->vtdeduc,"vneto"=>$datos->vneto]);
		}else{
			$reporteCE=Reporte_comprobante_egreso::where("cdatos",$cdatos)->first();
		}

		$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"impuestos"=>$impuestos,"rubros"=>$rubros,"Datosimpuesto"=>$datos_impuestos,"reporte"=>$reporteCE);
		//return view('pdf.comprobante_egreso', $data);

		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		$pdf = PDF::loadView('pdf.comprobante_egreso', $data);
		$namefile='Comprobante De Egreso Nº '.$reporteCE->id.'.pdf';
		return $pdf->setPaper('a4')->stream($namefile);
	}
}
