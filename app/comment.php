<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
