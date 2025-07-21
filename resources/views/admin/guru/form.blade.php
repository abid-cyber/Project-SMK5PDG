@extends('layouts.admin')
@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">{{ isset($guru) ? 'Edit' : 'Tambah' }} Guru/Staff</h1>
    <form action="{{ isset($guru) ? route('guru.update', $guru->id) : route('guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($guru)) @method('PUT') @endif
        <div class="mb-4">
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama" class="w-full border rounded p-2" value="{{ old('nama', $guru->nama ?? '') }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Jabatan</label>
            <input type="text" name="jabatan" class="w-full border rounded p-2" value="{{ old('jabatan', $guru->jabatan ?? '') }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Kontak</label>
            <input type="text" name="kontak" class="w-full border rounded p-2" value="{{ old('kontak', $guru->kontak ?? '') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2">{{ old('deskripsi', $guru->deskripsi ?? '') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tipe</label>
            <select name="tipe" class="w-full border rounded p-2" required>
                <option value="Guru" {{ old('tipe', $guru->tipe ?? '') == 'Guru' ? 'selected' : '' }}>Guru</option>
                <option value="Karyawan" {{ old('tipe', $guru->tipe ?? '') == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Foto</label>
            @if(isset($guru) && $guru->foto)
                <img src="{{ asset('storage/'.$guru->foto) }}" class="h-24 mb-2 rounded">
            @endif
            <input type="file" name="foto" class="w-full border rounded p-2">
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Simpan</button>
        <a href="{{ route('guru.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection 