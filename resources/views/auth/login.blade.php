<x-guest-layout>
    <div class="space-y-6">
        <div>
            <p class="text-xs uppercase tracking-[0.2em] font-semibold text-cyan-700">espace client</p>
            <h2 class="mt-2 text-3xl font-bold text-slate-900">Connexion</h2>
            <p class="mt-2 text-sm text-slate-600">Connecte-toi pour acceder au catalogue et a tes reservations.</p>
        </div>

        <x-auth-session-status class="p-3 rounded-xl bg-emerald-50 text-emerald-700" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" class="block mt-1 w-full rounded-xl" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" value="Mot de passe" />
                <x-text-input id="password" class="block mt-1 w-full rounded-xl" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-cyan-600 shadow-sm focus:ring-cyan-500" name="remember">
                    <span class="ms-2 text-sm text-slate-600">Se souvenir de moi</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-cyan-700 hover:text-cyan-800 font-semibold" href="{{ route('password.request') }}">
                        Mot de passe oublie ?
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-between pt-2">
                <a class="text-sm text-slate-600 hover:text-slate-900" href="{{ route('register') }}">
                    Pas encore inscrit ?
                </a>

                <x-primary-button class="rounded-xl !normal-case !tracking-normal !text-sm">
                    Se connecter
                </x-primary-button>
            </div>
        </form>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-sm text-slate-600">
            Acces administrateur :
            <a href="/admin/login" class="font-semibold text-cyan-700 hover:text-cyan-800">connexion</a>
            ou
            <a href="/admin/register" class="font-semibold text-cyan-700 hover:text-cyan-800">inscription</a>.
        </div>
    </div>
</x-guest-layout>
