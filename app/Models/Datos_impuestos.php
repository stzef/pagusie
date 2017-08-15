<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cdatos
 * @property int $cimpu
 * @property int $idDatos_Impuesto
 * @property float $vbase
 * @property float $porcentaje_Impuesto
 * @property float $vimpuesto
 * @property string $created_at
 * @property string $updated_at
 * @property DatosBasico $datosBasico
 * @property Impuesto $impuesto
 */
class Datos_impuestos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idDatos_Impuesto';

    /**
     * @var array
     */
    protected $fillable = ['cdatos', 'cimpu', 'vbase', 'porcentaje_Impuesto', 'vimpuesto', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datosBasico()
    {
        return $this->belongsTo('App\Models\DatosBasico', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function impuesto()
    {
        return $this->belongsTo('App\Models\Impuesto', 'cimpu', 'cimpu');
    }
}
