<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cunidad
 * @property string $nunidad
 * @property string $created_at
 * @property string $updated_at
 * @property Articulo[] $articulos
 */
class Unidades extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unidades';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cunidad';

    /**
     * @var array
     */
    protected $fillable = ['nunidad', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articulos()
    {
        return $this->hasMany('App\Models\Articulos', 'idunidad', 'cunidad');
    }
}
