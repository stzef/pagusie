<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idcheque
 * @property int $idcuentas_bancos
 * @property int $cestado
 * @property int $numcheque
 * @property string $concepto
 * @property float $valor
 * @property string $created_at
 * @property string $updated_at
 * @property CuentasBanco $cuentasBanco
 * @property Estado $estado
 * @property DatosCuenta[] $datosCuentas
 */
class Cheques extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['idcuentas_bancos', 'cestado', 'numcheque', 'concepto', 'valor', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cuentasBanco()
    {
        return $this->belongsTo('App\Models\Cuentas_bancos', 'idcuentas_bancos', 'idcuentas_bancos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Models\Estados', 'cestado', 'cestado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosCuentas()
    {
        return $this->hasMany('App\Models\Datos_cuentas', 'idcheque', 'idcheque');
    }
}
