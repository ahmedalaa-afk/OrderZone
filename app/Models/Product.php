<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'total', 'quantity', 'slug', 'vendor_id'];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }
    public function getCategoryName()
    {
        return $this->categories->pluck('name')->first();
    }
    public function photos()
    {
        return $this->hasMany(ProductPhotos::class);
    }
    public function color()
    {
        return $this->hasOne(ProductColors::class);
    }
    public function brand()
    {
        return $this->hasOne(ProductBrand::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function discounts()
    {
        return $this->morphOne(Discount::class, 'discountable');
    }
}
