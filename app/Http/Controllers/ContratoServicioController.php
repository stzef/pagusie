<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datos_basicos;
use App\Models\Terceros;
use App\Models\Colegio;
use PDF;
use NumeroALetras;
class ContratoServicioController extends Controller
{
    public function pdf(Request $request ){
		$cdatos = $request->input('cdatos');
		if ( !$cdatos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));
		$datos=Datos_basicos::where('cdatos',$cdatos)->first();
		if ( !$datos ) return view('errors/generic',array('title' => 'Error PDF.', 'message' => "El registro $cdatos no existe" ));

		$colegio=Colegio::all()->first();
		$letras = NumeroALetras::convertir($datos->vsiva,'pesos').' M/CTE.';
		$datos->ffactu=$this->formatDate($datos->ffactu,0);
		$datos->fpago=$this->formatDate($datos->fpago,0);
		$datos->ffactu=$this->formatDate($datos->ffactu,0);
		$datos->festcomp=$this->formatDate($datos->festcomp,0);
		$datos->fdispo=$this->formatDate($datos->fdispo,0);
		$datos->fregis=$this->formatDate($datos->fregis,0);
		$tercero=$datos->tercero;
		$data = array("datos" => $datos,"tercero" => $tercero,"colegio"=>$colegio,"letras"=>$letras,);
		PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
		$pdf = PDF::loadView('pdf.contrato_prestacion_servicios', $data);
		return $pdf->setPaper('a4')->stream();
	}

		function formatDate($fecha,$opcion){
		$fecha = substr($fecha, 0, 10);
		$numeroDia = date('d', strtotime($fecha));
		$dia = date('l', strtotime($fecha));
		$mes = date('F', strtotime($fecha));
		$anio = date('Y', strtotime($fecha));
		$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$nombredia = str_replace($dias_EN, $dias_ES, $dia);
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
		if ($opcion==0) {
			return $numeroDia." de ".$nombreMes." de ".$anio;
			# code...
		}else{
			return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
		}
	}
}
