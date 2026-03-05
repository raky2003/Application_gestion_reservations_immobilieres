@extends('layouts.app')

@section('content')
<div class="page-shell space-y-6">
    <a href="{{ route('properties.index') }}#catalogue" class="text-sm text-cyan-700 font-semibold hover:text-cyan-800">
        <- Retour au catalogue
    </a>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <section class="xl:col-span-2 glass-card p-6 sm:p-8 fade-up">
            <div class="h-60 sm:h-72 rounded-2xl bg-gradient-to-br from-cyan-100 via-blue-50 to-teal-100"></div>

            <h1 class="mt-6 text-3xl font-bold text-slate-900">{{ $property->name }}</h1>
            <p class="mt-4 text-slate-700 leading-relaxed">{{ $property->description }}</p>

            <div class="mt-6 inline-flex items-center px-4 py-2 rounded-xl bg-cyan-50 text-cyan-800 font-bold">
                {{ number_format($property->price_per_night, 2, ',', ' ') }} EUR / nuit
            </div>
        </section>

        <aside class="xl:col-span-1 fade-up">
            @livewire('booking-manager', ['property' => $property])
        </aside>
    </div>
</div>
@endsection
