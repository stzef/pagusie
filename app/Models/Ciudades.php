<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $cciud
 * @property integer $cdepar
 * @property string $nciudad
 * @property Departamento $departamento
 * @property Colegio[] $colegios
 * @property Tercero[] $terceros
 */
class Ciudades extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cdepar', 'nciudad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento', 'cdepar', 'cdepar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colegios()
    {
        return $this->hasMany('App\Models\Colegio', 'ciud', 'cciud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function terceros()
    {
        return $this->hasMany('App\Models\Tercero', 'cciud', 'cciud');
    }
}
