<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::forget('home_products');
        });
    }
}
