<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Application Généalogique</title>
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
                            <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                            <h1 class="text-2xl font-bold text-gray-900">
                                Application Généalogique
                            </h1>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('persons.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                Liste des Personnes
                            </a>
                        </div>
                    </div>
                </nav>
            </header>

            <main class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-200">
                        <div class="p-8">
                            <div class="text-center">
                                <h2 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">
                                    Explorez votre histoire familiale
                                </h2>
                                <p class="mt-4 text-xl text-gray-600 max-w-2xl mx-auto">
                                    Créez, organisez et visualisez votre arbre généalogique en toute simplicité
                                </p>
                            </div>

                            <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-indigo-500 transition-colors duration-200">
                                    <svg class="h-8 w-8 text-indigo-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    <h3 class="text-lg font-semibold text-gray-900">Ajoutez des membres</h3>
                                    <p class="mt-2 text-gray-600">Créez des profils pour chaque membre de votre famille.</p>
                                </div>

                                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-indigo-500 transition-colors duration-200">
                                    <svg class="h-8 w-8 text-indigo-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                    <h3 class="text-lg font-semibold text-gray-900">Établissez des liens</h3>
                                    <p class="mt-2 text-gray-600">Connectez les membres pour créer votre arbre.</p>
                                </div>

                                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-indigo-500 transition-colors duration-200">
                                    <svg class="h-8 w-8 text-indigo-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <h3 class="text-lg font-semibold text-gray-900">Visualisez</h3>
                                    <p class="mt-2 text-gray-600">Explorez votre arbre généalogique interactif.</p>
                                </div>
                            </div>

                            <div class="mt-12 flex justify-center">
                                <a href="{{ route('persons.create') }}" 
                                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Commencer
                                </a>
                            </div>
                        </div>
                    </div>
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