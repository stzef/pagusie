<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ccontra
 * @property int $cdatos
 * @property int $cticontrato
 * @property string $fecha
 * @property string $texto
 * @property float $vttotal
 * @property DatosBasico $datosBasico
 * @property TipoContrato $tipoContrato
 * @property ContratoArticuloDetalle[] $contratoArticuloDetalles
 */
class Contratos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ccontra';

    /**
     * @var array
     */
    protected $fillable = ['cdatos', 'cticontrato', 'fecha', 'texto', 'vttotal'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datosBasico()
    {
        return $this->belongsTo('App\Models\Datos_basico', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoContrato()
    {
        return $this->belongsTo('App\Models\Tipo_contrato', 'cticontrato', 'cticontrato');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratoArticuloDetalles()
    {
        return $this->hasMany('App\Models\Contrato_articulo_detalle', 'ccontra', 'ccontra');
    }
}
