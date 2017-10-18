<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cticontrato
 * @property string $nticontratos
 * @property Contrato[] $contratos
 */
class Tipo_contrato extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipo_contrato';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cticontrato';

    /**
     * @var array
     */
    protected $fillable = ['nticontratos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contratos', 'cticontrato', 'cticontrato');
    }
}
