@extends('layouts.admin')
@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Guru & Staff</h1>
        <a href="{{ route('guru.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Guru</a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Jabatan</th>
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gurus as $guru)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $guru->nama }}</td>
                    <td class="border px-4 py-2">{{ $guru->jabatan }}</td>
                    <td class="border px-4 py-2">
                        @if($guru->foto)
                        <img src="{{ asset('storage/'.$guru->foto) }}" alt="" class="h-16 rounded">
                        @endif
                    </td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('guru.show', $guru->id) }}" class="text-blue-600">Lihat</a>
                        <a href="{{ route('guru.edit', $guru->id) }}" class="text-yellow-600">Edit</a>
                        <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $gurus->links() }}</div>
</div>
@endsection 