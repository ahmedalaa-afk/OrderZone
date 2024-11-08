<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable=['size'];
    use HasFactory;
    public function products(){
        $this->hasMany(Product::class);
    }
}
