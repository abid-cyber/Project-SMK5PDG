@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Pengumuman SMKN 5 Padang</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($pengumuman as $item)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-xl font-bold">{{ $item->judul }}</h2>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                            @if($item->kategori == 'umum') bg-blue-100 text-blue-800
                            @elseif($item->kategori == 'akademik') bg-green-100 text-green-800
                            @elseif($item->kategori == 'ekstrakurikuler') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ ucfirst($item->kategori) }}
                        </span>
                    </div>
                    <p class="text-gray-600 mb-4">{{ Str::limit($item->isi, 150) }}</p>
                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span>{{ $item->created_at->format('d M Y') }}</span>
                        <span>Berlaku: {{ $item->tanggal_mulai->format('d/m/Y') }} - {{ $item->tanggal_selesai->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada pengumuman yang tersedia.</p>
            </div>
        @endforelse
    </div>
    
    @if($pengumuman->hasPages())
        <div class="mt-8">
            {{ $pengumuman->links() }}
        </div>
    @endif
</div>
@endsection 