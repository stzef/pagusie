<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idcontrato_articulo_detalle
 * @property int $ccontra
 * @property int $carti
 * @property int $canti
 * @property float $vunita
 * @property float $vtotal
 * @property string $centrada
 * @property string $created_at
 * @property string $updated_at
 * @property Contrato $contrato
 * @property Articulo $articulo
 */
class Contrato_articulo_detalle extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contrato_articulo_detalle';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idcontrato_articulo_detalle';

    /**
     * @var array
     */
    protected $fillable = ['ccontra', 'carti', 'canti', 'vunita', 'vtotal', 'centrada', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contrato()
    {
        return $this->belongsTo('App\Models\Contratos', 'ccontra', 'ccontra');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articulo()
    {
        return $this->belongsTo('App\Models\Articulos', 'carti', 'carti');
    }
}
