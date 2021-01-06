<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemsSlider extends Model
{
    protected $casts = [
        'id' => 'string'
    ];

    protected $primaryKey = 'id';
}
