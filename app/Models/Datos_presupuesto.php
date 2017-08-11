<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $iddatos_presupuesto
 * @property string $crubro
 * @property int $cdatos
 * @property float $valor
 * @property Datos_Basico $datosBasico
 * @property Presupuesto $presupuesto
 */
class Datos_presupuesto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'datos_presupuesto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddatos_presupuesto';

    /**
     * @var array
     */
    protected $fillable = ['crubro', 'cdatos', 'valor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datosBasico()
    {
        return $this->belongsTo('App\Models\Datos_Basico', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function presupuesto()
    {
        return $this->belongsTo('App\Models\Presupuesto', 'crubro', 'crubro');
    }
}
