@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Berita SMKN 5 Padang</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($beritas as $berita)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                @if($berita->gambar)
                    <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">{{ $berita->judul }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($berita->isi), 150) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $berita->created_at->format('d M Y') }}</span>
                        <a href="{{ route('berita.show', $berita) }}" class="text-blue-600 hover:text-blue-800">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada berita yang tersedia.</p>
            </div>
        @endforelse
    </div>
    
    @if($beritas->hasPages())
        <div class="mt-8">
            {{ $beritas->links() }}
        </div>
    @endif
</div>
@endsection