<?php

namespace App\Helper;
use Illuminate\Support\Facades\Validator;

class Helper
{

	static function formatDate($fecha,$opcion){
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
		}else{
			return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
		}
	}
	static function convocatoriaToN($convocatoria){
		$convocatoria=substr($convocatoria, -4);
		$number="";
		$deci=false;
		for ($i=0; $i <strlen($convocatoria); $i++) { 
			if ($deci) {
				$number=$number.$convocatoria[$i];
			}
			if ($convocatoria[$i]!='0' && $deci==false) {
				$number=$convocatoria[$i];
				$deci=true;
			}
		}
		return $number;
	}
	static function convocatoriaFormat($data){
		$validator=Validator::make($data,
			['convocatoria'=> 'nullable|integer|digits_between:1,4',
		],[
			'convocatoria.integer'=> 'La CONVOCATORIA debe ser numérica',
			'convocatoria.digits_between'=> 'La CONVOCATORIA debe de tener de :min a :max dígitos',
		]
	);
		if ($data['convocatoria']!=null) {
			if (!$validator->fails()) {
				$length=4-strlen($data['convocatoria']);
				$pre='CVT-'.$data['vigencia'].'-';
				$convocatoria= str_pad($pre, $length+9, "0").$data['convocatoria'];
				return $convocatoria;
			}else{
				$messages = $validator->messages();
				$message="";
				foreach ($messages->all() as $key) {
					$message.=" ".$key;
				}
				return response()->json(array("message"=>$message,"status"=>400),400);
			}
		}else{
			return null;
		}
	}
	static function convocatoriaSimpleFormat($data){
		if ($data['convocatoria']!=null) {
			$length=4-strlen($data['convocatoria']);
			$pre='CVT-'.$data['vigencia'].'-';
			$convocatoria= str_pad($pre, $length+9, "0").$data['convocatoria'];
			return $convocatoria;
		}else{
			return null;
		}
	}
	static function centradaFormat($data){
		$validator=Validator::make($data,
			['convocatoria'=> 'nullable|integer|digits_between:1,4',
		],[
			'convocatoria.integer'=> 'El CÓDIGO DE ENTRADA debe ser numérica',
			'convocatoria.digits_between'=> 'El CÓDIGO DE ENTRADA debe de tener de :min a :max dígitos',
		]
	);
		if ($data['centrada']!=null) {
			if (!$validator->fails()) {
				$length=4-strlen($data['centrada']);
				$pre='ENT-'.$data['vigencia'].'-';
				$centrada= str_pad($pre, $length+9, "0").$data['centrada'];
				return $centrada;
			}else{
				$messages = $validator->messages();
				$message="";
				foreach ($messages->all() as $key) {
					$message.=" ".$key;
				}
				return response()->json(array("message"=>$message,"status"=>400),400);
			}
		}else{
			return null;
		}
	}
}