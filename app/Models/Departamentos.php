<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $cdepar
 * @property string $ndepartamento
 * @property Ciudade[] $ciudades
 */
class Departamentos extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['ndepartamento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ciudades()
    {
        return $this->hasMany('App\Ciudade', 'cdepar', 'cdepar');
    }
}
