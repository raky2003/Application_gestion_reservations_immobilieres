<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingManager extends Component
{
    public Property $property;

    public $start_date;
    public $end_date;

    public function save()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);

        // Vérifier conflit de réservation
        $conflict = Booking::where('property_id', $this->property->id)
            ->where(function ($q) {
                $q->whereBetween('start_date', [$this->start_date, $this->end_date])
                  ->orWhereBetween('end_date', [$this->start_date, $this->end_date])
                  ->orWhere(function ($q2) {
                      $q2->where('start_date', '<=', $this->start_date)
                         ->where('end_date', '>=', $this->end_date);
                  });
            })
            ->exists();

        if ($conflict) {
            $this->addError('start_date', 'Ces dates ne sont pas disponibles.');
            return;
        }

        Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $this->property->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $this->reset(['start_date', 'end_date']);

        session()->flash('success', 'Réservation créée avec succès ✅');
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}
