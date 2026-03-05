<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-cyan-700" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        Accueil
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            Dashboard
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-slate-600 bg-white hover:text-slate-800 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">
                                Dashboard
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('profile.edit')">
                                Profil
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('bookings.mine')">
                                Mes reservations
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Deconnexion
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <div class="flex items-center gap-3">
                        <a href="{{ route('login') }}" class="text-sm text-slate-700 hover:text-slate-900">
                            Connexion
                        </a>

                        <a href="{{ route('register') }}" class="text-sm text-slate-700 hover:text-slate-900">
                            Inscription
                        </a>

                        <a href="/admin/login" class="text-sm text-cyan-700 font-semibold hover:text-cyan-800">
                            Admin
                        </a>
                    </div>
                @endguest
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                Accueil
            </x-responsive-nav-link>

            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-responsive-nav-link>
            @endauth
        </div>

        <div class="pt-4 pb-1 border-t border-slate-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-slate-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        Profil
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('bookings.mine')">
                        Mes reservations
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Deconnexion
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth

            @guest
                <div class="px-4 py-2 space-y-2">
                    <a href="{{ route('login') }}" class="block text-sm text-slate-700">
                        Connexion
                    </a>

                    <a href="{{ route('register') }}" class="block text-sm text-slate-700">
                        Inscription
                    </a>

                    <a href="/admin/login" class="block text-sm text-cyan-700 font-semibold">
                        Admin
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>
