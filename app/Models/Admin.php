<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use MacsiDigital\Zoom\Facades\Zoom;
use MacsiDigital\Zoom\Meeting;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class)->whereHas('admin', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
    public function departments()
    {
        return $this->hasMany(Department::class)->whereHas('admin', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
    public function brands()
    {
        return $this->hasMany(Brand::class)->whereHas('admin', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
    public function sizes()
    {
        return $this->hasMany(Size::class)->whereHas('admin', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
    public function colors()
    {
        return $this->hasMany(Color::class)->whereHas('admin', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
    public function tags()
    {
        return $this->hasMany(Color::class)->whereHas('admin', function ($query) {
            $query->where('name', 'product_manager');
        });
    }
}
