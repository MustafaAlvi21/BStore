<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
