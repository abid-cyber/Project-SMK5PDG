@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Kelola Berita</h2>
                    <a href="{{ route('berita.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Tambah Berita
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Gambar
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Judul
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($beritas as $berita)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if($berita->gambar)
                                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-16 h-12 object-cover rounded">
                                        @else
                                            <div class="w-16 h-12 bg-gray-200 rounded flex items-center justify-center">
                                                <span class="text-gray-500 text-xs">No Image</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{ $berita->judul }}</div>
                                        <div class="text-sm leading-5 text-gray-500">{{ Str::limit($berita->isi, 100) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($berita->kategori == 'umum') bg-blue-100 text-blue-800
                                            @elseif($berita->kategori == 'akademik') bg-green-100 text-green-800
                                            @elseif($berita->kategori == 'ekstrakurikuler') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($berita->kategori) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                        {{ $berita->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('berita.show', $berita) }}" class="text-blue-600 hover:text-blue-900">Lihat</a>
                                            <a href="{{ route('berita.edit', $berita) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('berita.destroy', $berita) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center text-gray-500">
                                        Belum ada berita yang ditambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($beritas->hasPages())
                    <div class="mt-6">
                        {{ $beritas->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 