<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemaObra extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tema_obra';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tema'];
}
