<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ccolegio
 * @property int $ciud
 * @property string $nombre
 * @property int $nit
 * @property int $dv
 * @property string $direccion
 * @property string $nrector
 * @property string $nauxadmin
 * @property string $created_at
 * @property string $updated_at
 * @property Ciudades $ciudad
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
    protected $fillable = ['ciud', 'nombre', 'nit', 'dv', 'direccion', 'nrector', 'nauxadmin', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudades', 'cciud', 'cciud');
    }
}