<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ccolegio
 * @property int $ciud
 * @property string $rector
 * @property string $auxad
 * @property string $nombre
 * @property string $nit
 * @property string $direccion
 * @property Ciudades $ciudad
 * @property User $user
 * @property User $user
 */
class Colegio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'colegio';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ccolegio';

    /**
     * @var array
     */
    protected $fillable = ['cciud', 'rector', 'auxad', 'nombre', 'nit','dv', 'direccion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudades', 'cciud', 'cciud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /*public function user()
    {
        return $this->belongsTo('App\User', 'rector', 'username');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   /* public function user()
    {
        return $this->belongsTo('App\User', 'auxad', 'username');
    }*/
}
