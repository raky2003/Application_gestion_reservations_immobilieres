@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-2xl font-bold mb-6">Mes réservations</h1>

    @if($bookings->isEmpty())
        <div class="bg-white rounded-xl shadow p-6 text-gray-700">
            Aucune réservation pour le moment.
        </div>
    @else
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left p-4">Propriété</th>
                        <th class="text-left p-4">Début</th>
                        <th class="text-left p-4">Fin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr class="border-t">
                            <td class="p-4 font-medium">{{ $booking->property->name }}</td>
                            <td class="p-4">{{ $booking->start_date }}</td>
                            <td class="p-4">{{ $booking->end_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
