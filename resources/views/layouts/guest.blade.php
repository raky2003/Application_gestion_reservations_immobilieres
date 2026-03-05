<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased">
        <div class="min-h-screen relative overflow-hidden bg-slate-50">
            <div class="absolute -top-20 -left-20 w-72 h-72 bg-cyan-300/30 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-teal-300/30 rounded-full blur-3xl"></div>

            <div class="relative min-h-screen flex items-center justify-center p-4 sm:p-6">
                <div class="w-full max-w-5xl grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="hidden lg:flex flex-col justify-between glass-card p-8">
                        <div>
                            <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                                <x-application-logo class="w-10 h-10 fill-current text-cyan-700" />
                                <span class="text-xl font-bold text-slate-900">{{ config('app.name', 'Laravel') }}</span>
                            </a>

                            <h1 class="mt-8 text-4xl font-extrabold leading-tight text-slate-900">
                                Plateforme de reservation nouvelle generation
                            </h1>
                            <p class="mt-4 text-slate-600">
                                Parcours fluide, espace client moderne et back-office admin Filament strictement separes.
                            </p>
                        </div>

                        <div class="text-sm text-slate-500">
                            Espace client: connexion / inscription
                            <br>
                            Espace admin: <a href="/admin/login" class="text-cyan-700 font-semibold hover:text-cyan-800">/admin/login</a>
                        </div>
                    </div>

                    <div class="glass-card p-6 sm:p-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
