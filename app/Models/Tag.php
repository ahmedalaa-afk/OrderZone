<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=['tag'];

    public function product(){
        $this->hasOne(Product::class, 'product_id');
    }
}
