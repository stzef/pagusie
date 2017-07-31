<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $cterce
 * @property integer $cciud
 * @property integer $nit
 * @property string $nombre
 * @property string $telefono
 * @property string $direccion
 * @property string $email
 * @property Ciudades $ciudad
 * @property DatosBasico[] $datosBasicos
 */
class Terceros extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cciud', 'nit','dv', 'nombre', 'telefono', 'direccion', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudades', 'cciud', 'cciud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosBasicos()
    {
        return $this->hasMany('App\Models\DatosBasico', 'cterce', 'cterce');
    }
}
