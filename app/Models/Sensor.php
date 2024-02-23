<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    //campos que queremos que sean rellenados
    protected $fillable = [
        'name', 'type', 'value', 'date', 'user_id'
    ];

}
