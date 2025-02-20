@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
    <header class="bg-white border-b border-gray-200">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-3">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <h1 class="text-2xl font-bold text-gray-900">
                        Créer une Personne
                    </h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('persons.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-50 hover:bg-gray-100">
                        Liste des personnes
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
            <div class="mb-4 bg-red-50 border-l-4 border-red-400 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Plusieurs erreurs ont été trouvées :</h3>
                        <ul class="mt-2 text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <form action="{{ route('persons.store') }}" method="POST" class="bg-white shadow-sm rounded-lg">
                @csrf
                <div class="p-6 space-y-6">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom *</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Nom *</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="birth_name" class="block text-sm font-medium text-gray-700">Nom de naissance</label>
                        <input type="text" id="birth_name" name="birth_name" value="{{ old('birth_name') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Si non renseigné, le nom sera utilisé</p>
                    </div>

                    <div>
                        <label for="middle_names" class="block text-sm font-medium text-gray-700">Autres prénoms</label>
                        <input type="text" id="middle_names" name="middle_names" value="{{ old('middle_names') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Séparez les prénoms par des virgules</p>
                    </div>

                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ route('persons.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Annuler
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Créer la personne
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection