<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Bienvenue, {{ Auth::user()->name }} 👋</h1>
                    <p class="text-gray-600 mt-1">Accède au catalogue, réserve et consulte tes réservations.</p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('home') }}#catalogue"
                       class="px-4 py-2 rounded-xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
                        Réserver un logement
                    </a>

                    <a href="{{ route('bookings.mine') }}"
                       class="px-4 py-2 rounded-xl bg-white border border-gray-200 text-gray-800 font-semibold hover:bg-gray-50">
                        Mes réservations
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="px-4 py-2 rounded-xl bg-white border border-gray-200 text-gray-800 font-semibold hover:bg-gray-50">
                        Mon profil
                    </a>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="text-sm text-gray-500">Action</div>
                    <div class="mt-1 text-lg font-semibold">Réserver</div>
                    <p class="text-gray-600 text-sm mt-2">Accède au catalogue et réserve un bien.</p>
                    <a href="{{ route('home') }}#catalogue" class="inline-block mt-4 text-indigo-700 font-semibold hover:underline">
                        Aller au catalogue →
                    </a>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="text-sm text-gray-500">Suivi</div>
                    <div class="mt-1 text-lg font-semibold">Mes réservations</div>
                    <p class="text-gray-600 text-sm mt-2">Consulte toutes tes réservations.</p>
                    <a href="{{ route('bookings.mine') }}" class="inline-block mt-4 text-indigo-700 font-semibold hover:underline">
                        Voir mes réservations →
                    </a>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="text-sm text-gray-500">Compte</div>
                    <div class="mt-1 text-lg font-semibold">Profil</div>
                    <p class="text-gray-600 text-sm mt-2">Modifie ton nom, email et mot de passe.</p>
                    <a href="{{ route('profile.edit') }}" class="inline-block mt-4 text-indigo-700 font-semibold hover:underline">
                        Modifier mon profil →
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
