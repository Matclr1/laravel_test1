@extends('layouts.app')

@section('title', 'Mes candidatures')

@section('content')
    <main class="max-w-2xl mx-auto px-4 py-12">

        {{-- En-tête : titre + bouton "créer" --}}
        <header class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Mes candidatures</h1>
                <p class="text-sm text-gray-500 mt-1">{{ $candidatures->count() }} candidatures · {{ $entretiens }} entretiens</p>
            </div>

            <a href="{{ route('candidatures.create') }}"
               class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                + Nouvelle candidature
            </a>
        </header>

        {{-- Liste des candidatures --}}
        <ul class="bg-white rounded-xl shadow-sm border border-gray-200 divide-y divide-gray-200">

            @forelse ($candidatures as $candidature)
                @php
                $badge = [
                    'Postulée'=> 'bg-blue-100 text-blue-800',
                    'Entretien' => 'bg-amber-100 text-amber-800',
                    'Refusée' => 'bg-red-100 text-red-800',
                    'Acceptée' => 'bg-green-100 text-green-800',
                ][$candidature->status];
                @endphp
                    <li class="flex items-center gap-4 px-5 py-4">
                        <div class="flex-1 min-w-0">
                            <a href="{{ route('candidatures.show', ['candidature' => $candidature->id]) }}"
                               class="text-gray-800 hover:underline">{{ $candidature->company }}</a>
                            <p class="text-sm text-gray-500">{{ $candidature->position }}</p>
                        </div>

                <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium rounded-full {{$badge}}">{{ $candidature->status }}</span>
                <span class="text-sm text-gray-500 tabular-nums">{{ $candidature->applied_at }}</span>

                <div class="flex items-center gap-2">
                    <a href="{{ route('candidatures.edit', ['candidature' => $candidature->id]) }}"
                       class="text-sm text-gray-600 hover:text-gray-900 px-3 py-1 rounded-md hover:bg-gray-100 transition">
                        Modifier
                    </a>
                    <form action="{{ route('candidatures.destroy', ['candidature' => $candidature->id]) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-sm text-red-600 hover:text-red-700 px-3 py-1 rounded-md hover:bg-red-50 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
            </li>
              
                @empty
            <li class="px-5 py-4 text-center text-sm text-gray-600">
                Aucune candidature pour le moment. Cliquez sur "Nouvelle candidature"!
            
            </li>

            @endforelse
        </ul>
               
    </main>
@endsection