<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $carti
 * @property int $cunidad
 * @property string $narticulo
 * @property string $created_at
 * @property string $updated_at
 * @property Unidade $unidad
 * @property ContratoArticuloDetalle[] $contratoArticuloDetalles
 */
class Articulos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'carti';

    /**
     * @var array
     */
    protected $fillable = ['cunidad', 'narticulo', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidades', 'cunidad', 'cunidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratoArticuloDetalles()
    {
        return $this->hasMany('App\Models\Contrato_articulo_detalle', 'carti', 'carti');
    }
}
