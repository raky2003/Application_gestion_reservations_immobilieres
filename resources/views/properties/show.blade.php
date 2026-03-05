@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:underline">← Retour</a>

    <div class="mt-4 bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold">{{ $property->name }}</h1>
        <p class="mt-3 text-gray-700">{{ $property->description }}</p>

        <div class="mt-4 text-indigo-700 font-bold">
            {{ number_format($property->price_per_night, 2) }} € / nuit
        </div>
    </div>

    <div class="mt-6">
        @livewire('booking-manager', ['property' => $property])
    </div>

</div>
@endsection
