<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['name', 'image', 'order'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
