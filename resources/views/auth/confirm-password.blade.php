<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Confirmation requise</h2>
            <p class="mt-2 text-sm text-slate-600">
                Zone securisee: confirme ton mot de passe pour continuer.
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="password" value="Mot de passe" />
                <x-text-input id="password" class="block mt-1 w-full rounded-xl" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-primary-button class="rounded-xl !normal-case !tracking-normal !text-sm">
                    Confirmer
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
