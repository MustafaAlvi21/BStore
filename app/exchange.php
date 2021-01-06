<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exchange extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
