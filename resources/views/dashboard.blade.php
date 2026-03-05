<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            Dashboard client
        </h2>
    </x-slot>

    <div class="page-shell space-y-8">
        <section class="glass-card p-8 sm:p-10 relative overflow-hidden fade-up">
            <div class="absolute -top-12 -right-12 w-44 h-44 bg-cyan-300/30 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-12 -left-12 w-44 h-44 bg-teal-300/30 rounded-full blur-2xl"></div>

            <div class="relative flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-700">espace client</p>
                    <h1 class="mt-2 section-title">Bienvenue, {{ Auth::user()->name }}</h1>
                    <p class="mt-2 subtle-text">Gere rapidement ton parcours: catalogue, reservations, profil.</p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('properties.index') }}#catalogue" class="btn-primary">
                        Voir catalogue
                    </a>
                    <a href="{{ route('bookings.mine') }}" class="btn-soft">
                        Mes reservations
                    </a>
                    <a href="{{ route('profile.edit') }}" class="btn-soft">
                        Mon profil
                    </a>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-3 gap-5 fade-up">
            <a href="{{ route('properties.index') }}#catalogue" class="glass-card p-6 hover-lift">
                <p class="text-sm font-medium text-cyan-700">Action</p>
                <h3 class="mt-2 text-xl font-bold text-slate-900">Decouvrir le catalogue</h3>
                <p class="mt-2 subtle-text">Parcours les logements et lance une reservation en quelques clics.</p>
                <span class="mt-4 inline-block text-cyan-700 font-semibold">Voir catalogue -></span>
            </a>

            <a href="{{ route('bookings.mine') }}" class="glass-card p-6 hover-lift">
                <p class="text-sm font-medium text-cyan-700">Suivi</p>
                <h3 class="mt-2 text-xl font-bold text-slate-900">Mes reservations</h3>
                <p class="mt-2 subtle-text">Consulte l'historique et les details de tes sejours.</p>
                <span class="mt-4 inline-block text-cyan-700 font-semibold">Voir reservations -></span>
            </a>

            <a href="{{ route('profile.edit') }}" class="glass-card p-6 hover-lift">
                <p class="text-sm font-medium text-cyan-700">Compte</p>
                <h3 class="mt-2 text-xl font-bold text-slate-900">Mon profil</h3>
                <p class="mt-2 subtle-text">Mets a jour tes informations personnelles en toute securite.</p>
                <span class="mt-4 inline-block text-cyan-700 font-semibold">Modifier profil -></span>
            </a>
        </section>
    </div>
</x-app-layout>
