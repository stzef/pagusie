<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $cparam
 * @property string $name
 * @property string $type
 * @property string $value_text
 * @property boolean $value_bool
 * @property int $value_int
 * @property int $row
 * @property string $created_at
 * @property string $updated_at
 */
class Parametros extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cparam', 'name', 'type', 'value_text', 'value_bool', 'value_int', 'row', 'created_at', 'updated_at'];

}
