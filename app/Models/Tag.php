<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['name','admin_id'];

    public function product(){
        $this->hasOne(Product::class, 'product_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class)->whereHas('roles', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
}
