<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Mot de passe oublie</h2>
            <p class="mt-2 text-sm text-slate-600">
                Entre ton email et on t'enverra un lien pour reinitialiser ton mot de passe.
            </p>
        </div>

        <x-auth-session-status class="p-3 rounded-xl bg-emerald-50 text-emerald-700" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" class="block mt-1 w-full rounded-xl" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-primary-button class="rounded-xl !normal-case !tracking-normal !text-sm">
                    Envoyer le lien
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
