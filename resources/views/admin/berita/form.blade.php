@extends('layouts.admin')

@section('title', isset($berita) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        {{ isset($berita) ? 'Edit Berita' : 'Tambah Berita Baru' }}
                    </h2>
                    <a href="{{ route('berita.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ isset($berita) ? route('berita.update', $berita) : route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($berita))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Berita</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul ?? '') }}" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select name="kategori" id="kategori" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Pilih Kategori</option>
                                <option value="umum" {{ (old('kategori', $berita->kategori ?? '') == 'umum') ? 'selected' : '' }}>Umum</option>
                                <option value="akademik" {{ (old('kategori', $berita->kategori ?? '') == 'akademik') ? 'selected' : '' }}>Akademik</option>
                                <option value="ekstrakurikuler" {{ (old('kategori', $berita->kategori ?? '') == 'ekstrakurikuler') ? 'selected' : '' }}>Ekstrakurikuler</option>
                                <option value="prestasi" {{ (old('kategori', $berita->kategori ?? '') == 'prestasi') ? 'selected' : '' }}>Prestasi</option>
                            </select>
                        </div>

                        <div>
                            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
                            <input type="file" name="gambar" id="gambar" accept="image/*"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @if(isset($berita) && $berita->gambar)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="Current Image" class="w-32 h-24 object-cover rounded">
                                    <p class="text-sm text-gray-500 mt-1">Gambar saat ini</p>
                                </div>
                            @endif
                        </div>

                        <div class="md:col-span-2">
                            <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">Isi Berita</label>
                            <textarea name="isi" id="isi" rows="10" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('isi', $berita->isi ?? '') }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Anda dapat menggunakan HTML tags untuk formatting</p>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ isset($berita) ? 'Update Berita' : 'Simpan Berita' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 