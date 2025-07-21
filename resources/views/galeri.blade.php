@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Galeri Foto</h1>
    <div class="mb-4 flex flex-wrap gap-2">
        <a href="{{ route('galeri.public') }}" class="px-3 py-1 rounded bg-blue-100 text-blue-700">Semua</a>
        @foreach($albums as $album)
            @if($album)
            <a href="?album={{ $album }}" class="px-3 py-1 rounded bg-blue-50 text-blue-600">{{ $album }}</a>
            @endif
        @endforeach
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($galeris as $galeri)
        <div class="bg-white rounded shadow p-2">
            <img src="{{ asset('storage/'.$galeri->gambar) }}" alt="{{ $galeri->judul }}" class="w-full h-48 object-cover rounded mb-2">
            <div class="font-semibold">{{ $galeri->judul }}</div>
            <div class="text-sm text-gray-500">{{ $galeri->album }}</div>
            <div class="text-xs mt-1">{{ $galeri->deskripsi }}</div>
        </div>
        @endforeach
    </div>
    <div class="mt-6">{{ $galeris->links() }}</div>
</div>
@endsection 