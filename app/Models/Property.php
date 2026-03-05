<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price_per_night'];

    // app/Models/Property.php
public function bookings()
{
    return $this->hasMany(\App\Models\Booking::class);
}
}
