<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['size'];
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity')->withTimestamps();
    }
}
