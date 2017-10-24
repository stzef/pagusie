<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $cciud
 * @property integer $cdepar
 * @property string $nciudad
 * @property Departamentos $departamento
 * @property Colegio[] $colegio
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
        return $this->belongsTo('App\Models\Departamentos', 'cdepar', 'cdepar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colegio()
    {
        return $this->hasMany('App\Models\Colegio', 'cciud', 'cciud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function terceros()
    {
        return $this->hasMany('App\Models\Terceros', 'cciud', 'cciud');
    }
}
