<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
