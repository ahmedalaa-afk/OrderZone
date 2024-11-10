<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'total', 'quantity', 'slug', 'vendor_id','color_id','size_id'];
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
        return $this->belongsTo(Color::class);
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_product');
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function discounts()
    {
        return $this->morphOne(Discount::class, 'discountable');
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}
