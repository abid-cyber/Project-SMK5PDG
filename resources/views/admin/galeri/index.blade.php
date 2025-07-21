@extends('layouts.admin')
@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Galeri Foto</h1>
        <a href="{{ route('galeri.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Foto</a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Judul</th>
                    <th class="px-4 py-2 border">Album</th>
                    <th class="px-4 py-2 border">Gambar</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galeris as $galeri)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $galeri->judul }}</td>
                    <td class="border px-4 py-2">{{ $galeri->album }}</td>
                    <td class="border px-4 py-2">
                        <img src="{{ asset('storage/'.$galeri->gambar) }}" alt="" class="h-16 rounded">
                    </td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('galeri.show', $galeri->id) }}" class="text-blue-600">Lihat</a>
                        <a href="{{ route('galeri.edit', $galeri->id) }}" class="text-yellow-600">Edit</a>
                        <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $galeris->links() }}</div>
</div>
@endsection 