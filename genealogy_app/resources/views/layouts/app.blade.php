<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Genealogy</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased">
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
        <header class="bg-white border-b border-gray-200">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center space-x-3">
                        <a href="{{ url('/') }}" class="flex items-center space-x-3">
                            <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                            <span class="text-2xl font-bold text-gray-900">Genealogy</span>
                        </a>
                    </div>

                    <div class="flex items-center space-x-4">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Connexion</a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Inscription</a>
                            @endif
                        @else
                            <div class="relative flex items-center space-x-4" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center space-x-2 text-gray-600 hover:text-gray-900">
                                    <span>{{ Auth::user()->name }}</span>
                                    </button>
                                
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class=" px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium flex items-center">
                                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                
                            </div>
                        @endguest
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>

        <footer class="bg-white border-t border-gray-200 mt-12">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="text-center text-gray-500">
                    <p class="flex items-center justify-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Application Généalogique - {{ date('Y') }}
                    </p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>