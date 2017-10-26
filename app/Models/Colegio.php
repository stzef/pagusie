<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


/**
 * @property int $ccolegio
 * @property int $cciud
 * @property string $nombre
 * @property int $nit
 * @property int $dv
 * @property string $direccion
 * @property string $nrector
 * @property string $nauxadmin
 * @property string $telefono1
 * @property string $telefono2
 * @property string $e-mail
 * @property string $created_at
 * @property string $updated_at
 * @property Ciudade $ciudade
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
    protected $fillable = ['cciud', 'nombre', 'nit', 'dv', 'direccion', 'nrector', 'nauxadmin', 'telefono1', 'telefono2', 'e-mail', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudades', 'cciud', 'cciud');
    }
}