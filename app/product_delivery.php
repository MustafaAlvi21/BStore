<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_delivery extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
