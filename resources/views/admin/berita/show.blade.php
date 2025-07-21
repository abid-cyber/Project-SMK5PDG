@extends('layouts.admin')

@section('title', $berita->judul)

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Detail Berita</h2>
                    <div class="flex space-x-2">
                        <a href="{{ route('berita.edit', $berita) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Berita
                        </a>
                        <a href="{{ route('berita.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2">
                        <div class="mb-6">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $berita->judul }}</h1>
                            
                            <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full font-medium">
                                    {{ ucfirst($berita->kategori) }}
                                </span>
                                <span>{{ $berita->created_at->format('d F Y H:i') }}</span>
                            </div>

                            @if($berita->gambar)
                                <div class="mb-6">
                                    <img src="{{ asset('storage/berita/' . $berita->gambar) }}" 
                                         alt="{{ $berita->judul }}" 
                                         class="w-full h-64 object-cover rounded-lg shadow-md">
                                </div>
                            @endif

                            <div class="prose max-w-none">
                                {!! $berita->isi !!}
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Berita</h3>
                            
                            <div class="space-y-3">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Kategori:</span>
                                    <p class="text-sm text-gray-900">{{ ucfirst($berita->kategori) }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Tanggal Dibuat:</span>
                                    <p class="text-sm text-gray-900">{{ $berita->created_at->format('d F Y H:i') }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Terakhir Diupdate:</span>
                                    <p class="text-sm text-gray-900">{{ $berita->updated_at->format('d F Y H:i') }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Status:</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <h4 class="text-sm font-medium text-gray-900 mb-3">Aksi</h4>
                                <div class="space-y-2">
                                    <a href="{{ route('berita.edit', $berita) }}" 
                                       class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded">
                                        Edit Berita
                                    </a>
                                    <form action="{{ route('berita.destroy', $berita) }}" method="POST" 
                                          onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="block w-full bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2 px-4 rounded">
                                            Hapus Berita
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 