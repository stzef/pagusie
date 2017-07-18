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
 * @property Ciudade $ciudade
 * @property DatosBasico[] $datosBasicos
 */
class Terceros extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cciud', 'nit', 'nombre', 'telefono', 'direccion', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudade()
    {
        return $this->belongsTo('App\Ciudade', 'cciud', 'cciud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosBasicos()
    {
        return $this->hasMany('App\DatosBasico', 'cterce', 'cterce');
    }
}
