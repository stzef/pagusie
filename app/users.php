<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $cpersona
 * @property integer $ctiusuario
 * @property string $username
 * @property string $email
 * @property string $password
 * @property boolean $active
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Persona $persona
 * @property Tiusuario $tiusuario
 * @property Colegio[] $colegios
 * @property Colegio[] $colegios
 */
class users extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cpersona', 'ctiusuario', 'username', 'email', 'password', 'active', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'cpersona', 'cpersona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiusuario()
    {
        return $this->belongsTo('App\Tiusuario', 'ctiusuario', 'ctiusuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colegios()
    {
        return $this->hasMany('App\Colegio', 'rector', 'username');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colegios()
    {
        return $this->hasMany('App\Colegio', 'auxad', 'username');
    }
}
