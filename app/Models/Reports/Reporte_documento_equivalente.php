<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cdatos
 * @property DatosBasico $datosBasico
 */
class Reporte_documento_equivalente extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'reporte_documento_equivalente';

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
