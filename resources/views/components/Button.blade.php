@props([
    'variant' => 'primary', // primary | secondary
    'type' => 'button'
])

@php
    $base = 'inline-flex items-center justify-center px-4 py-2 rounded-lg font-medium transition';
    $variants = [
        'primary' => 'bg-primary text-white hover:opacity-90',
        'secondary' => 'bg-secondary text-white hover:opacity-90',
    ];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $base.' '.($variants[$variant] ?? $variants['primary'])]) }}>
    {{ $slot }}
</button>
