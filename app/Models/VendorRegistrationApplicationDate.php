<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorRegistrationApplicationDate extends Model
{
    use HasFactory;
    protected $fillable=['start_at', 'end_at'];
}
