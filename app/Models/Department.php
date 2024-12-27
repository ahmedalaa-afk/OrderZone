<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    protected $fillable=['name','description','admin_id'];
    use HasFactory,SoftDeletes;

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class)->whereHas('roles', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
}
