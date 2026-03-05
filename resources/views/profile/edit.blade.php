<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            Mon profil
        </h2>
    </x-slot>

    <div class="page-shell">
        <div class="mx-auto max-w-5xl space-y-6">
            <div class="grid gap-6 lg:grid-cols-2">
                <div class="glass-card p-6 sm:p-8 fade-up">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="glass-card p-6 sm:p-8 fade-up">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="glass-card p-6 sm:p-8 fade-up border border-rose-100 bg-rose-50/60">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
