@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
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
                        @auth
                            <a href="{{ route('persons.create') }}" 
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Commencer
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                                Se connecter pour commencer
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection