<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class make_offer extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
