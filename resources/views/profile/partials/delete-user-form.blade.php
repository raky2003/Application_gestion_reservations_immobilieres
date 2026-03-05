<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-slate-900">Supprimer le compte</h2>
        <p class="mt-1 text-sm text-slate-600">
            Cette action est irreversible et supprimera toutes tes donnees.
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="rounded-xl !normal-case !tracking-normal !text-sm">
        Supprimer mon compte
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-slate-900">
                Confirmer la suppression
            </h2>

            <p class="mt-1 text-sm text-slate-600">
                Entre ton mot de passe pour confirmer la suppression definitive du compte.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Mot de passe" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full rounded-xl" placeholder="Mot de passe" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="rounded-xl !normal-case !tracking-normal !text-sm">
                    Annuler
                </x-secondary-button>

                <x-danger-button class="ms-3 rounded-xl !normal-case !tracking-normal !text-sm">
                    Supprimer
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
