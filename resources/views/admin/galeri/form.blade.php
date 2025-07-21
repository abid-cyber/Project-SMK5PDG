@extends('layouts.admin')
@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">{{ isset($galeri) ? 'Edit' : 'Tambah' }} Foto</h1>
    <form action="{{ isset($galeri) ? route('galeri.update', $galeri->id) : route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($galeri)) @method('PUT') @endif
        <div class="mb-4">
            <label class="block mb-1">Judul</label>
            <input type="text" name="judul" class="w-full border rounded p-2" value="{{ old('judul', $galeri->judul ?? '') }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2">{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Album</label>
            <input type="text" name="album" class="w-full border rounded p-2" value="{{ old('album', $galeri->album ?? '') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Gambar</label>
            @if(isset($galeri) && $galeri->gambar)
                <img src="{{ asset('storage/'.$galeri->gambar) }}" class="h-24 mb-2 rounded">
            @endif
            <input type="file" name="gambar" class="w-full border rounded p-2" {{ isset($galeri) ? '' : 'required' }}>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Simpan</button>
        <a href="{{ route('galeri.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection 