<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $crubro
 * @property string $nrubro
 * @property float $vr_rubro_presupuestado
 * @property float $vr_rubro_ejecutado
 * @property Datos_Presupuesto[] $datosPresupuestos
 */
class Presupuesto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'presupuesto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'crubro';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

  
    /**
     * @var array
     */
    protected $fillable = ['nrubro', 'vr_rubro_presupuestado', 'vr_rubro_ejecutado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosPresupuestos()
    {
        return $this->hasMany('App\Models\Datos_Presupuesto', 'crubro', 'crubro');
    }
}
