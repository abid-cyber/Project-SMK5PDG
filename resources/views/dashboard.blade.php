@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard Admin</h2>
                <p class="mb-4">Anda berhasil login sebagai admin.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-blue-800 mb-2">Kelola Berita</h3>
                        <p class="text-blue-600 mb-4 text-sm">Tambah, edit, dan hapus berita sekolah</p>
                        <a href="{{ route('berita.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                            Kelola Berita
                        </a>
                    </div>
                    
                    <div class="bg-green-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-green-800 mb-2">Kelola Pengumuman</h3>
                        <p class="text-green-600 mb-4 text-sm">Tambah, edit, dan hapus pengumuman sekolah</p>
                        <a href="{{ route('pengumuman.index') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                            Kelola Pengumuman
                        </a>
                    </div>
                    
                    <div class="bg-yellow-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-yellow-800 mb-2">Lihat Website</h3>
                        <p class="text-yellow-600 mb-4 text-sm">Lihat tampilan website sekolah</p>
                        <a href="/" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700 text-sm">
                            Lihat Website
                        </a>
                    </div>
                    
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-purple-800 mb-2">Profil</h3>
                        <p class="text-purple-600 mb-4 text-sm">Kelola profil admin</p>
                        <a href="{{ route('profile.edit') }}" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 text-sm">
                            Edit Profil
                        </a>
                    </div>

                    <div class="bg-pink-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-pink-800 mb-2">Kelola Guru & Staff</h3>
                        <p class="text-pink-600 mb-4 text-sm">Tambah, edit, dan hapus data guru & staff</p>
                        <a href="{{ url('/admin/guru') }}" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 text-sm">
                            Kelola Guru & Staff
                        </a>
                    </div>
                </div>

                <!-- Statistik Cepat -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Berita</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Berita::count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Pengumuman</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Pengumuman::count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Pengumuman Aktif</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Pengumuman::where('status', 'aktif')->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-pink-100 text-pink-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2h5m6 0v-2a2 2 0 00-2-2H9a2 2 0 00-2 2v2m6 0a2 2 0 002-2v-2a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Guru & Staff</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Guru::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
