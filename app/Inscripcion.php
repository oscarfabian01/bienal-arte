<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inscripcion';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['artista_id', 'obra_id', 'estado', 'aceptado'];
}
