@extends('layouts.admin')
@section('content')
<div class="container mx-auto p-4 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Detail Guru/Staff</h1>
    <div class="mb-4">
        @if($guru->foto)
        <img src="{{ asset('storage/'.$guru->foto) }}" class="w-32 h-40 object-cover rounded shadow mb-2">
        @endif
    </div>
    <div class="mb-2"><strong>Nama:</strong> {{ $guru->nama }}</div>
    <div class="mb-2"><strong>Jabatan:</strong> {{ $guru->jabatan }}</div>
    <div class="mb-2"><strong>Kontak:</strong> {{ $guru->kontak }}</div>
    <div class="mb-2"><strong>Deskripsi:</strong> {{ $guru->deskripsi }}</div>
    <a href="{{ route('guru.index') }}" class="text-blue-600">Kembali</a>
</div>
@endsection 