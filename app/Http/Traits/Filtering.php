<?php

namespace App\Http\Traits;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Filtering
{
    public function getWomenProducts($key){
        return Product::whereHas('categories', function ($query) use ($key){
            $query->where('name', $key);
        })->get();
    }
}
