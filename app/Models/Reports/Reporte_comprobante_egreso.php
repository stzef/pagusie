<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cdatos
 * @property float $vtdeduc
 * @property float $vneto
 * @property string $created_at
 * @property string $update_at
 * @property DatosBasico $datosBasico
 */
class Reporte_comprobante_egreso extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'reporte_comprobante_egreso';

    /**
     * @var array
     */
    protected $fillable = ['cdatos', 'vtdeduc', 'vneto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datosBasico()
    {
        return $this->belongsTo('App\Models\Datos_basico', 'cdatos', 'cdatos');
    }
}
