<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','admin_id'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'brand_product');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class)->whereHas('roles', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
}
