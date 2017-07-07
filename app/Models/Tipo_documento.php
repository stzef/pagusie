<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ctidocumento
 * @property string $ntidocumento
 * @property DatosBasico[] $datosBasicos
 */
class Tipo_documento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipo_documento';

    /**
     * @var array
     */
    protected $fillable = ['ntidocumento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosBasicos()
    {
        return $this->hasMany('App\DatosBasico', 'ctidocumento', 'ctidocumento');
    }
}
