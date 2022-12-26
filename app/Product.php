<?php

namespace App;

use App\Application;
use App\Color;
use App\ProductPicture;
use App\VariableProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description', 'outstanding', 'order', 'extra1'];

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function applications()
    {
        return $this->belongsToMany(Application::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}

