<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = [
        'name',
        'age',
        'phone',
        'avatar'
    ];
}