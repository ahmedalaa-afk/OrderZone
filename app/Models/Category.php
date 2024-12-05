<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = ['name', 'parent_id','department_id'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function discounts()
    {
        return $this->morphMany(Discount::class, 'discountable');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
