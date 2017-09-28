<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $iddatos_cuentas
 * @property int $cdatos
 * @property int $idcheque
 * @property string $created_at
 * @property string $updated_at
 * @property Cheque $cheque
 * @property DatosBasico $datosBasico
 */
class Datos_cuentas extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'datos_cuentas';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddatos_cuentas';

    /**
     * @var array
     */
    protected $fillable = ['cdatos', 'idcheque', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cheque()
    {
        return $this->belongsTo('App\Models\Cheque', 'idcheque', 'idcheque');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datosBasico()
    {
        return $this->belongsTo('App\Models\DatosBasico', 'cdatos', 'cdatos');
    }
}
