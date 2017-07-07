<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $cestado
 * @property string $nestado
 * @property Cheque[] $cheques
 * @property DatosBasico[] $datosBasicos
 */
class Estados extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nestado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cheques()
    {
        return $this->hasMany('App\Cheque', 'cestado', 'cestado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosBasicos()
    {
        return $this->hasMany('App\DatosBasico', 'cestado', 'cestado');
    }
}
