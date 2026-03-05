<x-guest-layout>
    <div class="space-y-6">
        <div>
            <p class="text-xs uppercase tracking-[0.2em] font-semibold text-cyan-700">espace client</p>
            <h2 class="mt-2 text-3xl font-bold text-slate-900">Creer un compte</h2>
            <p class="mt-2 text-sm text-slate-600">Ton compte cree ici reste un compte client uniquement.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="name" value="Nom complet" />
                <x-text-input id="name" class="block mt-1 w-full rounded-xl" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" class="block mt-1 w-full rounded-xl" type="email" name="email" :value="old('email')" required autocomplete="username" />
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

            <div class="flex items-center justify-between pt-2">
                <a class="text-sm text-slate-600 hover:text-slate-900" href="{{ route('login') }}">
                    Deja inscrit ?
                </a>

                <x-primary-button class="rounded-xl !normal-case !tracking-normal !text-sm">
                    S'inscrire
                </x-primary-button>
            </div>
        </form>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-sm text-slate-600">
            Besoin d'un compte administrateur ?
            <a href="/admin/register" class="font-semibold text-cyan-700 hover:text-cyan-800">S'inscrire en admin</a>
            ou
            <a href="/admin/login" class="font-semibold text-cyan-700 hover:text-cyan-800">se connecter</a>.
        </div>
    </div>
</x-guest-layout>
