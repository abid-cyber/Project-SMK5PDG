@extends('layouts.app')

@section('title', 'SMKN 5 Padang')

@section('content')
<nav id="main-navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent text-white">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-6 md:px-12">
        <div class="flex items-center gap-4 min-w-max">
            <img src="/img/logosmkn5pdg.png" alt="Logo" class="h-16 w-auto">
            <span class="text-3xl font-extrabold tracking-wide">SMKN 5 PADANG</span>
        </div>
        <ul class="flex space-x-8 font-semibold">
            <li x-data="{ open: false }" class="relative">
                <button @mouseenter="open = true" @mouseleave="open = false" @click="open = !open"
                    class="hover:underline flex items-center gap-1 focus:outline-none">
                    Profil Sekolah
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" @mouseenter="open = true" @mouseleave="open = false"
                    class="absolute left-0 mt-2 w-48 bg-white text-black rounded shadow-lg z-50"
                    x-transition>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sambutan Kepala Sekolah</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sejarah</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Struktur Organisasi</a>
                    <a href="{{ route('staff') }}" class="block px-4 py-2 hover:bg-gray-100">Staff</a>
                    <a href="{{ route('galeri.public') }}" class="block px-4 py-2 hover:bg-gray-100">Galeri</a>
                </div>
            </li>
            <li x-data="{ open: false }" class="relative">
                <button @mouseenter="open = true" @mouseleave="open = false" @click="open = !open"
                    class="hover:underline flex items-center gap-1 focus:outline-none">
                    Berita
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" @mouseenter="open = true" @mouseleave="open = false"
                    class="absolute left-0 mt-2 w-48 bg-white text-black rounded shadow-lg z-50"
                    x-transition>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Berita Terbaru</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Info Sekolah</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Agenda</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Galeri</a>
                </div>
            </li>
            <li x-data="{ open: false }" class="relative">
                <button @mouseenter="open = true" @mouseleave="open = false" @click="open = !open"
                    class="hover:underline flex items-center gap-1 focus:outline-none">
                    Keuangan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" @mouseenter="open = true" @mouseleave="open = false"
                    class="absolute left-0 mt-2 w-48 bg-white text-black rounded shadow-lg z-50"
                    x-transition>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">BOS</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">APBD</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Komite</a>
                </div>
            </li>
            <li><a href="{{ route('layanan') }}" class="hover:underline">Layanan</a></li>
            <li><a href="{{ route('prestasi') }}" class="hover:underline">Prestasi</a></li>
            <li><a href="{{ route('alumni') }}" class="hover:underline">Profil Alumni</a></li>
            <li><a href="{{ route('kontak') }}" class="hover:underline">Kontak</a></li>
        </ul>
    </div>
                </nav>
<header class="relative w-full h-[100vh] bg-cover bg-no-repeat bg-[center_80%]" style="background-image: url('/img/smk.jpg');">
    <div class="absolute inset-0 flex flex-col items-center justify-center">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">SMKN 5 PADANG</h1>
        <form class="w-full max-w-xl flex">
            <input type="text" placeholder="Apa yang ingin anda cari?" class="flex-1 rounded-l-full px-6 py-3 focus:outline-none">
            <button class="bg-yellow-400 text-white px-8 py-3 rounded-r-full font-semibold hover:bg-yellow-500 transition">Cari</button>
        </form>
    </div>
        </header>

<section class="bg-white py-12">
    <div class="container mx-auto flex flex-col md:flex-row gap-8">
        <!-- Pengumuman -->
        <div class="md:w-1/3 w-full">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-blue-900 text-white px-6 py-4 font-bold text-lg">Pengumuman</div>
                <ul class="divide-y divide-gray-200">
                    @forelse($pengumuman as $item)
                        <li class="px-6 py-4 hover:bg-gray-50 cursor-pointer">
                            <div class="font-semibold">{{ $item->judul }}</div>
                            <div class="text-sm text-gray-500">{{ $item->created_at->format('d M, Y') }}</div>
                            <div class="text-xs text-gray-400 mt-1">{{ Str::limit($item->isi, 80) }}</div>
                        </li>
                    @empty
                        <li class="px-6 py-4 text-gray-500 text-center">
                            Belum ada pengumuman
                        </li>
                    @endforelse
                    </ul>
                @if($pengumuman->count() > 0)
                    <div class="px-6 py-3 bg-gray-50">
                        <a href="/pengumuman" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Lihat Semua Pengumuman →
                        </a>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Sambutan Kepala Sekolah -->
        <div class="md:w-2/3 w-full">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <img src="/img/kepala-sekolah.jpg" alt="Kepala Sekolah" class="w-40 h-52 object-cover rounded-lg shadow-md mb-4 md:mb-0">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold mb-2 text-blue-900">Sambutan Kepala Sekolah</h2>
                        <p class="italic text-gray-700 mb-2">Bismillahirrohmanirrahim<br>Assalamu'alaikum Wr. Wb.</p>
                        <p class="text-gray-700">
                            Segala puji hanya untuk Allah SWT dan shalawat serta salam semoga tercurah atas nabi yang terakhir, yaitu nabi kita Muhammad SAW, begitu pula atas keluarga, para sahabat dan para pengikutnya.<br><br>
                            Alhamdulillahi robbil alamin kami panjatkan kehadlirat Tuhan Allah SWT, bahwasannya dengan rahmat dan karunia-Nya lah akhirnya Website sekolah ini dapat kami perbaharui dan kembangkan...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Terbaru Section -->
<section class="bg-blue-900 py-16">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-white text-center mb-12">Berita Terbaru</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($beritas as $berita)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 bg-blue-900 text-white px-3 py-1 rounded-br-lg">
                            {{ $berita->created_at->format('d M, Y') }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold mb-2 text-gray-900">{{ $berita->judul }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ Str::limit(strip_tags($berita->isi), 120) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('berita.show', $berita) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                                Read More >>
                            </a>
                            <span class="text-xs text-gray-500 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                admin
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-white text-lg">Belum ada berita yang tersedia.</p>
                </div>
            @endforelse
        </div>

        @if($beritas->count() > 0)
            <div class="text-center mt-8">
                <a href="/berita" class="bg-white text-blue-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Lihat Semua Berita
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Guru & Tenaga Kependidikan Section -->
<section class="bg-white py-16">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">Guru dan Tenaga Kependidikan</h2>
        <div 
            x-data="{ slide: 0, max: {{ $gurus->count() > 0 ? ceil($gurus->count()/4) : 1 }} }" 
            class="relative mb-8"
        >
            <!-- Tombol Panah Kiri -->
            <button 
                @click="slide = Math.max(slide-1, 0)" 
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-2 z-10" 
                :disabled="slide === 0"
            >
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <!-- Slider -->
            <div class="overflow-hidden">
                <div 
                    class="flex transition-transform duration-300"
                    :style="'transform: translateX(-' + (slide * 100) + '%)'"
                >
                    @foreach($gurus->chunk(4) as $chunk)
                        <div class="min-w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach($chunk as $guru)
                                <div class="bg-white rounded-lg shadow flex flex-col items-center p-6">
                                    @if($guru->foto)
                                        <img src="{{ asset('storage/'.$guru->foto) }}" alt="{{ $guru->nama }}" class="w-32 h-40 object-cover rounded mb-2">
                                    @else
                                        <img src="/img/avatar-default.png" alt="Avatar" class="w-32 h-40 object-cover rounded mb-2">
                                    @endif
                                    <div class="font-bold text-lg text-center">{{ $guru->nama }}</div>
                                    <div class="text-blue-700 text-sm font-semibold text-center">{{ $guru->jabatan }}</div>
                                    <div class="text-yellow-500 text-xs text-center mt-1">{{ $guru->deskripsi }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Tombol Panah Kanan -->
            <button 
                @click="slide = Math.min(slide+1, max-1)" 
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-2 z-10" 
                :disabled="slide === max-1"
            >
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <div class="text-center">
            <a href="{{ route('staff') }}" class="bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-800 transition-colors">Lihat Semua Guru & Staff</a>
        </div>
    </div>
</section>
@endsection

{{-- Tambahkan script di bawah sebelum </body> --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('main-navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.remove('bg-transparent', 'text-white');
            navbar.classList.add('bg-white', 'shadow', 'text-black');
        } else {
            navbar.classList.remove('bg-white', 'shadow', 'text-black');
            navbar.classList.add('bg-transparent', 'text-white');
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
