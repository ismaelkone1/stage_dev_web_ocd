@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
    <header class="bg-white border-b border-gray-200">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-3">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                    <h1 class="text-2xl font-bold text-gray-900">
                        Détails de la Personne
                    </h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('persons.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                        </svg>
                        Retour à la liste
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-200">
                <div class="p-8">
                    <div class="mb-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">
                                    {{ $person->first_name }} {{ $person->last_name }}
                                </h2>
                                <p class="mt-2 text-gray-600">Créé par: {{ $person->creator->name }}</p>
                                <p class="mt-1 text-gray-600">Nom de naissance: {{ $person->birth_name }}</p>
                                @if($person->middle_names)
                                    <p class="mt-1 text-gray-600">Autres prénoms: {{ $person->middle_names }}</p>
                                @endif
                                <p class="mt-1 text-gray-600">Date de naissance: {{ $person->date_of_birth ? \Carbon\Carbon::parse($person->date_of_birth)->format('d/m/Y') : 'Non renseignée' }}</p>
                                </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-semibold text-gray-900">Parents</h3>
                                <button type="button" class="inline-flex items-center px-3 py-1 border border-transparent text-sm rounded-md text-indigo-600 hover:text-indigo-900">
                                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            <ul class="space-y-2">
                                @forelse($person->parents as $parent)
                                    <li class="flex justify-between items-center text-gray-600">
                                        <a href="{{ route('persons.show', $parent->id) }}" class="hover:text-indigo-600">
                                            {{ $parent->first_name }} {{ $parent->last_name }}
                                        </a>
                                    </li>
                                @empty
                                    <li class="text-gray-500 italic">Aucun parent enregistré</li>
                                @endforelse
                            </ul>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-semibold text-gray-900">Enfants</h3>
                                <button type="button" class="inline-flex items-center px-3 py-1 border border-transparent text-sm rounded-md text-indigo-600 hover:text-indigo-900">
                                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            <ul class="space-y-2">
                                @forelse($person->children as $child)
                                    <li class="flex justify-between items-center text-gray-600">
                                        <a href="{{ route('persons.show', $child->id) }}" class="hover:text-indigo-600">
                                            {{ $child->first_name }} {{ $child->last_name }}
                                        </a>
                                    </li>
                                @empty
                                    <li class="text-gray-500 italic">Aucun enfant enregistré</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection