<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
