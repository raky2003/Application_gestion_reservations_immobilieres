<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Accueil
            </h2>

            @guest
                <div class="flex gap-3">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900 underline">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-gray-900 underline">
                        Inscription
                    </a>
                </div>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="text-sm text-blue-600 hover:underline">
                    Aller au dashboard
                </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- HERO / BIENVENUE -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-10 text-white shadow mb-10">
                @guest
                    <h1 class="text-4xl font-bold">Bienvenue 👋</h1>
                    <p class="mt-3 text-white/90 text-lg max-w-2xl">
                        Découvrez des propriétés exclusives et réservez en quelques clics.
                        Connectez-vous ou créez un compte pour gérer vos réservations.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('register') }}"
                           class="px-5 py-3 bg-white text-blue-700 font-semibold rounded-xl hover:bg-white/90">
                            Créer un compte
                        </a>
                        <a href="{{ route('login') }}"
                           class="px-5 py-3 bg-blue-900/30 border border-white/30 text-white font-semibold rounded-xl hover:bg-blue-900/40">
                            Se connecter
                        </a>
                    </div>
                @endguest

                @auth
                    <h1 class="text-4xl font-bold">Bienvenue, {{ auth()->user()->name }} 👋</h1>
                    <p class="mt-3 text-white/90 text-lg max-w-2xl">
                        Réservez facilement des propriétés partout dans le monde. Simple, rapide et sécurisé.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('dashboard') }}"
                           class="px-5 py-3 bg-white text-blue-700 font-semibold rounded-xl hover:bg-white/90">
                            Aller au dashboard
                        </a>
                        <a href="{{ route('bookings.mine') }}"
                           class="px-5 py-3 bg-blue-900/30 border border-white/30 text-white font-semibold rounded-xl hover:bg-blue-900/40">
                            Mes réservations
                        </a>
                    </div>
                @endauth
            </div>

            <!-- SECTION "QUI SOMMES-NOUS" -->
            <div class="bg-white rounded-2xl shadow p-8 mb-10">
                <h2 class="text-xl font-bold text-gray-800">Qui sommes-nous ?</h2>
                <p class="mt-3 text-gray-600">
                    Nous sommes une plateforme spécialisée dans la gestion et la réservation de biens immobiliers.
                    Notre mission est de simplifier l’expérience de location grâce à une interface fluide, moderne et sécurisée.
                </p>
            </div>

            <!-- CATALOGUE -->
            <div id="catalogue" class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Propriétés disponibles</h2>
                <a href="{{ route('home') }}" class="text-sm text-blue-600 hover:underline">
                    Rafraîchir
                </a>
            </div>

            @if($properties->count() === 0)
                <div class="bg-white p-6 rounded-xl shadow">
                    Aucune propriété disponible pour le moment.
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($properties as $property)
                        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $property->name }}</h3>
                                <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                                    {{ $property->description }}
                                </p>

                                <div class="mt-4 flex items-center justify-between">
                                    <div class="text-blue-600 font-bold">
                                        {{ number_format($property->price_per_night, 2, ',', ' ') }} € / nuit
                                    </div>

                                    <a href="{{ route('properties.show', $property) }}"
                                       class="px-4 py-2 bg-blue-600 text-white text-sm rounded-xl hover:bg-blue-700">
                                        Réserver
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $properties->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
