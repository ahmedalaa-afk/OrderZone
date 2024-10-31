<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_slug','quantity'];

    public function product()
    {
        return $this->hasOne(Product::class, 'slug', 'product_slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
