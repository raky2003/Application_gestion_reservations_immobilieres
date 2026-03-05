
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;
use App\Models\Property;

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect('/admin');
        }

        return redirect()->route('dashboard');
    }

    $properties = Property::latest()->take(4)->get();
    $hasMoreProperties = Property::count() > 4;

    return view('properties.index', [
        'properties' => $properties,
        'isHome' => true,
        'hasMoreProperties' => $hasMoreProperties,
    ]);
})->middleware('not_admin')->name('home');

Route::middleware('not_admin')->group(function () {
    Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
});

Route::middleware(['auth', 'verified', 'client'])->group(function () {
    Route::get('/dashboard', function () {
        $properties = Property::latest()->take(4)->get();
        return view('dashboard', compact('properties'));
    })->name('dashboard');

    Route::get('/mes-reservations', [BookingController::class, 'mine'])->name('bookings.mine');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
