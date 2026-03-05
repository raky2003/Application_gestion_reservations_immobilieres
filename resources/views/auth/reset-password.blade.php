<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Nouveau mot de passe</h2>
            <p class="mt-2 text-sm text-slate-600">Definis un mot de passe robuste pour securiser ton compte.</p>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" class="block mt-1 w-full rounded-xl" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" value="Mot de passe" />
                <x-text-input id="password" class="block mt-1 w-full rounded-xl" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" value="Confirmation du mot de passe" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-xl" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-primary-button class="rounded-xl !normal-case !tracking-normal !text-sm">
                    Reinitialiser
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
