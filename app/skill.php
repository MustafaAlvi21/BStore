<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
