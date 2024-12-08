<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    protected $fillable=['name','description'];
    use HasFactory,SoftDeletes;

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
