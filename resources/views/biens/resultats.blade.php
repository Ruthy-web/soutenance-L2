@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Résultats de recherche</h1>
    
    @if($biens->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($biens as $bien)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if($bien->image)
                        <img src="{{ asset('storage/' . $bien->image) }}" alt="{{ $bien->titre }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $bien->titre }}</h3>
                        <p class="text-gray-600 mb-2">{{ $bien->localisation }}</p>
                        <p class="text-lg font-bold text-indigo-600">{{ number_format($bien->prix) }} FCFA/mois</p>
                        <p class="text-sm text-gray-500 mt-2">{{ Str::limit($bien->description, 100) }}</p>
                        <div class="mt-4">
                            <a href="{{ route('property-details', $bien->id) }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                                Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-8">
            {{ $biens->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <h2 class="text-2xl font-semibold text-gray-600 mb-4">Aucun bien trouvé</h2>
            <p class="text-gray-500 mb-6">Essayez de modifier vos critères de recherche.</p>
            <a href="{{ route('properties') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded hover:bg-indigo-700">
                Voir tous les biens
            </a>
        </div>
    @endif
</div>
@endsection