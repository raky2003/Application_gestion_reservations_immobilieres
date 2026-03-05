<section>
    <header>
        <h2 class="text-xl font-bold text-slate-900">Informations du profil</h2>
        <p class="mt-1 text-sm text-slate-600">Mets a jour ton nom et ton email.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Nom" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-xl" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full rounded-xl" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 rounded-xl bg-amber-50 text-amber-800 text-sm">
                    Ton email n'est pas encore verifie.
                    <button form="send-verification" class="underline font-semibold ms-1">
                        Renvoyer le lien de verification
                    </button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-emerald-600">
                        Nouveau lien de verification envoye.
                    </p>
                @endif
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="rounded-xl !normal-case !tracking-normal !text-sm">
                Enregistrer
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-slate-600">
                    Modifications enregistrees.
                </p>
            @endif
        </div>
    </form>
</section>
