<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idcuentas_bancos
 * @property int $cbanco
 * @property string $numcuenta
 * @property string $created_at
 * @property string $updated_at
 * @property Banco $banco
 * @property Cheque[] $cheques
 */
class Cuentas_bancos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idcuentas_bancos';

    /**
     * @var array
     */
    protected $fillable = ['cbanco', 'numcuenta', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function banco()
    {
        return $this->belongsTo('App\Models\Bancos', 'cbanco', 'cbanco');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cheques()
    {
        return $this->hasMany('App\Models\Cheques', 'idcuentas_bancos', 'idcuentas_bancos');
    }
}
