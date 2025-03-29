<?php

namespace Huckabuild\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    
    protected $fillable = [
        'key',
        'value'
    ];

    public $timestamps = true;
} 