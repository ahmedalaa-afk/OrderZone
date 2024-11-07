<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable=['color'];
    use HasFactory;
    public function products(){
        $this->hasMany(Product::class);
    }
}
