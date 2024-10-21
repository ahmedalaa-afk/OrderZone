<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['title', 'content', 'admin_id'];
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(Admin::class)->where('role', 'vendor_manager');
    }
}
