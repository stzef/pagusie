<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cterce
 * @property int $cciud
 * @property int $nit
 * @property int $dv
 * @property string $nombre
 * @property int $telefono
 * @property string $direccion
 * @property string $email
 * @property string $cnombre
 * @property string $ctelefono
 * @property string $cemail
 * @property string $created_at
 * @property string $updated_at
 * @property Ciudade $ciudade
 * @property DatosBasico[] $datosBasicos
 */
class Terceros extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cciud', 'nit', 'dv', 'nombre', 'telefono', 'direccion', 'email', 'cnombre', 'ctelefono', 'cemail', 'created_at', 'updated_at'];

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
