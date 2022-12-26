<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name', 'code', 'color', 'order'];

    public function colors()
    {
        return $this->belongsToMany(Product::class);
    }
}
