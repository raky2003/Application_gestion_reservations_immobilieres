<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Verification email</h2>
            <p class="mt-2 text-sm text-slate-600">
                Clique sur le lien recu par email pour activer ton compte client.
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="p-3 rounded-xl bg-emerald-50 text-emerald-700 text-sm">
                Un nouveau lien de verification a ete envoye.
            </div>
        @endif

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-primary-button class="rounded-xl !normal-case !tracking-normal !text-sm">
                    Renvoyer l'email
                </x-primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-slate-600 hover:text-slate-900 font-semibold">
                    Se deconnecter
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
