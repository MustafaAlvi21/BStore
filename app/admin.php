<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
