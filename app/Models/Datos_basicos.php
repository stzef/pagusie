<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cdatos
 * @property int $cterce
 * @property int $ctidocumento
 * @property int $cestado
 * @property int $vigencia
 * @property string $convocatoria
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
 * @property string $updated_at
 * @property Estado $estado
 * @property TipoDocumento $tipoDocumento
 * @property Tercero $tercero
 * @property Contrato $contrato
 * @property DatosCuenta[] $datosCuentas
 * @property DatosImpuesto[] $datosImpuestos
 * @property DatosPresupuesto[] $datosPresupuestos
 * @property ReporteCertificadoPrecio $reporteCertificadoPrecio
 * @property ReporteComprobanteEgreso $reporteComprobanteEgreso
 * @property ReporteContratoPrestacionServicio $reporteContratoPrestacionServicio
 * @property ReporteContratoSuministro $reporteContratoSuministro
 * @property ReporteDisponibilidadPresupuestal $reporteDisponibilidadPresupuestal
 * @property ReporteDocumentoEquivalente $reporteDocumentoEquivalente
 * @property ReporteReciboSatisfaccion $reporteReciboSatisfaccion
 * @property ReporteRegistroPresupuestal $reporteRegistroPresupuestal
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
        return $this->belongsTo('App\Models\Estado', 'cestado', 'cestado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDocumento()
    {
        return $this->belongsTo('App\Models\Tipo_documento', 'ctidocumento', 'ctidocumento');
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
     public function contrato()
    {
        return $this->hasOne('App\Models\Contratos', 'cdatos', 'cdatos');
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
     public function reporteCertificadoPrecio()
    {
        return $this->hasOne('App\Models\ReporteCertificadoPrecio', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reporteComprobanteEgreso()
    {
        return $this->hasOne('App\Models\ReporteComprobanteEgreso', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reporteContratoPrestacionServicio()
    {
        return $this->hasOne('App\Models\ReporteContratoPrestacionServicio', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reporteContratoSuministro()
    {
        return $this->hasOne('App\Models\ReporteContratoSuministro', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reporteDisponibilidadPresupuestal()
    {
        return $this->hasOne('App\Models\ReporteDisponibilidadPresupuestal', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reporteDocumentoEquivalente()
    {
        return $this->hasOne('App\Models\ReporteDocumentoEquivalente', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reporteReciboSatisfaccion()
    {
        return $this->hasOne('App\Models\ReporteReciboSatisfaccion', 'cdatos', 'cdatos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reporteRegistroPresupuestal()
    {
        return $this->hasOne('App\Models\ReporteRegistroPresupuestal', 'cdatos', 'cdatos');
    }
}
