<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $cdatos
 * @property integer $cestado
 * @property integer $ctidocumento
 * @property integer $cterce
 * @property integer $vigencia
 * @property string $fpago
 * @property string $ffactu
 * @property string $nfactu
 * @property string $concepto
 * @property string $justificacion
 * @property string $plazo
 * @property string $festcomp
 * @property string $fdispo
 * @property string $fregis
 * @property float $vsiva
 * @property float $viva
 * @property float $vtotal
 * @property string $created_at
 * @property string $update_at
 * @property Estado $estado
 * @property TipoDocumento $tipoDocumento
 * @property Tercero $tercero
 * @property ContratoArticuloDetalle[] $contratoArticuloDetalles
 * @property DatosCuenta[] $datosCuentas
 * @property DatosImpuesto[] $datosImpuestos
 * @property DatosPresupuesto[] $datosPresupuestos
 */
class Datos_basicos extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cestado', 'ctidocumento', 'cterce', 'vigencia', 'fpago', 'ffactu', 'nfactu', 'concepto', 'justificacion', 'plazo', 'festcomp', 'fdispo', 'fregis', 'vsiva', 'viva', 'vtotal'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Estado', 'cestado', 'cestado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDocumento()
    {
        return $this->belongsTo('App\TipoDocumento', 'ctidocumento', 'ctidocumento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tercero()
    {
        return $this->belongsTo('App\Models\Terceros', 'cterce', 'cterce');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratoArticuloDetalles()
    {
        return $this->hasMany('App\Models\ContratoArticuloDetalle', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosCuentas()
    {
        return $this->hasMany('App\Models\Datos_cuentas', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosImpuestos()
    {
        return $this->hasMany('App\Models\Datos_impuestos', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosPresupuestos()
    {
        return $this->hasMany('App\Models\Datos_presupuesto', 'cdatos', 'cdatos');
    }
}
