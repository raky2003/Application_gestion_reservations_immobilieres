<x-app-layout>
    @php
        $isHome = $isHome ?? false;
        $hasMoreProperties = $hasMoreProperties ?? false;
    @endphp

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                {{ $isHome ? 'Accueil' : 'Catalogue' }}
            </h2>

            @auth
                <a href="{{ route('dashboard') }}" class="text-sm text-cyan-700 hover:text-cyan-800 font-semibold">
                    Retour dashboard
                </a>
            @endauth
        </div>
    </x-slot>

    <div class="page-shell space-y-8">
        <section class="glass-card p-8 sm:p-10 fade-up">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.2em] font-semibold text-cyan-700">catalogue premium</p>
                    <h1 class="mt-2 section-title">Trouve ton prochain logement</h1>
                    <p class="mt-3 max-w-3xl subtle-text">
                        Selection de biens avec reservation immediate, suivi clair et parcours fluide.
                    </p>
                </div>

                @guest
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('register') }}" class="btn-primary">Creer un compte</a>
                        <a href="{{ route('login') }}" class="btn-soft">Se connecter</a>
                    </div>
                @endguest
            </div>
        </section>

        <section class="fade-up">
            <div id="catalogue" class="flex flex-wrap items-center justify-between gap-4 mb-5">
                <h2 class="text-2xl font-bold text-slate-900">Biens disponibles</h2>
                @if ($isHome)
                    <a href="{{ route('properties.index') }}#catalogue" class="text-sm text-cyan-700 font-semibold hover:text-cyan-800">
                        Voir tout le catalogue
                    </a>
                @else
                    <a href="{{ route('properties.index') }}" class="text-sm text-cyan-700 font-semibold hover:text-cyan-800">
                        Rafraichir
                    </a>
                @endif
            </div>

            @if($properties->count() === 0)
                <div class="glass-card p-8 text-slate-600">
                    Aucun bien disponible pour le moment.
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    @foreach($properties as $property)
                        <article class="glass-card p-5 hover-lift">
                            <div class="h-32 rounded-2xl bg-gradient-to-br from-cyan-100 via-blue-50 to-teal-100 mb-5"></div>

                            <h3 class="text-lg font-bold text-slate-900 leading-tight">{{ $property->name }}</h3>
                            <p class="text-sm text-slate-600 mt-2 line-clamp-3">{{ $property->description }}</p>

                            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                                <div class="text-cyan-700 font-bold">
                                    {{ number_format($property->price_per_night, 2, ',', ' ') }} EUR / nuit
                                </div>

                                <a href="{{ route('properties.show', $property) }}" class="btn-primary !px-4 !py-2 !text-sm">
                                    Reserver
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if ($isHome)
                    @if ($hasMoreProperties)
                        <div class="mt-8 text-center">
                            <a href="{{ route('properties.index') }}#catalogue" class="btn-primary">
                                Voir plus
                            </a>
                        </div>
                    @endif
                @else
                    <div class="mt-8">
                        {{ $properties->links() }}
                    </div>
                @endif
            @endif
        </section>
    </div>
</x-app-layout>
