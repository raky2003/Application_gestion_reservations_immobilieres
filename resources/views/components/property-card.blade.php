@props(['property'])

<div class="rounded-2xl bg-white shadow-sm border p-5 flex flex-col gap-3">
    <div>
        <h3 class="text-lg font-semibold">{{ $property->name }}</h3>
        <p class="text-sm text-gray-600 mt-1 line-clamp-3">{{ $property->description }}</p>
    </div>

    <div class="flex items-center justify-between mt-2">
        <div class="text-sm">
            <span class="text-gray-500">Prix / nuit :</span>
            <span class="font-semibold">{{ number_format($property->price_per_night, 2, ',', ' ') }} €</span>
        </div>

        {{ $actions ?? '' }}
    </div>
</div>
