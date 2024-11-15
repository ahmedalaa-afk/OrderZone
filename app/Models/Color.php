<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['color'];
    use HasFactory;
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity')->withTimestamps();
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class)->withPivot('quantity')->withTimestamps();
    }
}
