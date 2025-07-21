@extends('layouts.admin')

@section('title', isset($pengumuman) ? 'Edit Pengumuman' : 'Tambah Pengumuman')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        {{ isset($pengumuman) ? 'Edit Pengumuman' : 'Tambah Pengumuman Baru' }}
                    </h2>
                    <a href="{{ route('pengumuman.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
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

                <form action="{{ isset($pengumuman) ? route('pengumuman.update', $pengumuman) : route('pengumuman.store') }}" method="POST">
                    @csrf
                    @if(isset($pengumuman))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Pengumuman</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $pengumuman->judul ?? '') }}" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select name="kategori" id="kategori" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Pilih Kategori</option>
                                <option value="umum" {{ (old('kategori', $pengumuman->kategori ?? '') == 'umum') ? 'selected' : '' }}>Umum</option>
                                <option value="akademik" {{ (old('kategori', $pengumuman->kategori ?? '') == 'akademik') ? 'selected' : '' }}>Akademik</option>
                                <option value="ekstrakurikuler" {{ (old('kategori', $pengumuman->kategori ?? '') == 'ekstrakurikuler') ? 'selected' : '' }}>Ekstrakurikuler</option>
                                <option value="prestasi" {{ (old('kategori', $pengumuman->kategori ?? '') == 'prestasi') ? 'selected' : '' }}>Prestasi</option>
                            </select>
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" id="status" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="aktif" {{ (old('status', $pengumuman->status ?? '') == 'aktif') ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ (old('status', $pengumuman->status ?? '') == 'nonaktif') ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>

                        <div>
                            <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" 
                                value="{{ old('tanggal_mulai', isset($pengumuman) ? $pengumuman->tanggal_mulai->format('Y-m-d') : '') }}" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" 
                                value="{{ old('tanggal_selesai', isset($pengumuman) ? $pengumuman->tanggal_selesai->format('Y-m-d') : '') }}" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div class="md:col-span-2">
                            <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">Isi Pengumuman</label>
                            <textarea name="isi" id="isi" rows="8" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('isi', $pengumuman->isi ?? '') }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Anda dapat menggunakan HTML tags untuk formatting</p>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ isset($pengumuman) ? 'Update Pengumuman' : 'Simpan Pengumuman' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 