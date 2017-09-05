<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cdatos
 * @property DatosBasico $datosBasico
 */
class Reporte_certificado_precio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'reporte_certificado_precio';

    /**
     * @var array
     */
    protected $fillable = ['cdatos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datosBasico()
    {
        return $this->belongsTo('App\Models\Datos_basico', 'cdatos', 'cdatos');
    }
}
