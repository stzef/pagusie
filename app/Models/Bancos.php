<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cbanco
 * @property string $nbanco
 * @property string $created_at
 * @property string $updated_at
 * @property CuentasBanco[] $cuentasBancos
 */
class Bancos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cbanco';

    /**
     * @var array
     */
    protected $fillable = ['nbanco', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuentasBancos()
    {
        return $this->hasMany('App\Models\Cuentas_bancos', 'cbanco', 'cbanco');
    }
}
