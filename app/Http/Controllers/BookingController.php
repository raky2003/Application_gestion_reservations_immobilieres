<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Booking;


class BookingController extends Controller
{
   public function mine()
{
    $bookings = Booking::where('user_id', Auth::id())
        ->with('property')
        ->latest()
        ->get();

    return view('bookings.mine', compact('bookings'));
}
}
