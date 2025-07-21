@extends('layouts.admin')
@section('content')
<div class="container mx-auto p-4 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Detail Foto</h1>
    <div class="mb-4">
        <img src="{{ asset('storage/'.$galeri->gambar) }}" class="w-full rounded shadow">
    </div>
    <div class="mb-2"><strong>Judul:</strong> {{ $galeri->judul }}</div>
    <div class="mb-2"><strong>Album:</strong> {{ $galeri->album }}</div>
    <div class="mb-2"><strong>Deskripsi:</strong> {{ $galeri->deskripsi }}</div>
    <a href="{{ route('galeri.index') }}" class="text-blue-600">Kembali</a>
</div>
@endsection 