<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'total', 'slug', 'quantity', 'vendor_id', 'tag_id','color_id'];
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
    public function carts()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }
    public function discounts()
    {
        return $this->morphOne(Discount::class, 'discountable');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class)->withPivot('quantity')->withTimestamps();
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'product_wishlist')->withTimestamps();
    }
    public function checkouts()
    {
        return $this->belongsToMany(Checkout::class, 'checkout_product')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }
}
