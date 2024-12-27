<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    protected $fillable = ['name','admin_id'];
    use HasFactory,SoftDeletes;
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity')->withTimestamps();
    }
    public function admin(){
        return $this->belongsTo(Admin::class)->whereHas('roles', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
}
