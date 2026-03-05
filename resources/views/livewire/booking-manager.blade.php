<div class="glass-card p-6 sm:p-7">
    <h3 class="text-xl font-bold text-slate-900">Reserver ce bien</h3>
    <p class="mt-1 text-sm text-slate-600">Choisis tes dates et confirme instantanement.</p>

    @if (session()->has('success'))
        <div class="mt-4 p-3 rounded-xl bg-emerald-50 text-emerald-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @guest
        <div class="mt-4 p-4 rounded-xl bg-amber-50 text-amber-800 text-sm">
            Tu dois etre connecte pour reserver.
            <a class="underline font-semibold" href="{{ route('login') }}">Se connecter</a>
        </div>
    @endguest

    @auth
        <div class="mt-5 space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700">Date debut</label>
                <input type="date" wire:model="start_date"
                       class="mt-1 w-full rounded-xl border-slate-300 focus:border-cyan-500 focus:ring-cyan-500">
                @error('start_date') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Date fin</label>
                <input type="date" wire:model="end_date"
                       class="mt-1 w-full rounded-xl border-slate-300 focus:border-cyan-500 focus:ring-cyan-500">
                @error('end_date') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <button wire:click="save" class="btn-primary w-full mt-6">
            Confirmer la reservation
        </button>
    @endauth
</div>
