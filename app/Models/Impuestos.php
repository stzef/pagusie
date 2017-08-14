<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cimpu
 * @property string $nimpuesto
 * @property float $porcentajeImpuesto
 * @property string $created_at
 * @property string $updated_at
 * @property DatosImpuesto[] $datosImpuestos
 */
class Impuestos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cimpu';

    /**
     * @var array
     */
    protected $fillable = ['nimpuesto', 'porcentajeImpuesto', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosImpuestos()
    {
        return $this->hasMany('App\DatosImpuesto', 'cimpu', 'cimpu');
    }
}
