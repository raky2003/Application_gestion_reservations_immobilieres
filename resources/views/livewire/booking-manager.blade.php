<div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-lg font-semibold mb-4">Réserver ce bien</h3>

    @if (session()->has('success'))
        <div class="mb-4 p-3 rounded bg-green-50 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @guest
        <div class="p-3 rounded bg-yellow-50 text-yellow-800">
            Vous devez être connecté pour réserver.
            <a class="underline font-semibold" href="{{ route('login') }}">Se connecter</a>
        </div>
    @endguest

    @auth
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Date début</label>
                <input type="date" wire:model="start_date"
                       class="mt-1 w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                @error('start_date') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Date fin</label>
                <input type="date" wire:model="end_date"
                       class="mt-1 w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                @error('end_date') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <button wire:click="save"
                class="mt-5 inline-flex items-center justify-center px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition">
            Confirmer la réservation
        </button>
    @endauth
</div>
