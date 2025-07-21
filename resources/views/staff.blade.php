@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Guru dan Tenaga Kependidikan</h1>
    <div class="flex justify-center gap-4 mb-8">
        <a href="?tipe=Guru" class="px-6 py-2 rounded border font-semibold {{ request('tipe', 'Guru') == 'Guru' ? 'bg-blue-700 text-white' : 'bg-white text-blue-700 border-blue-700' }}">GURU</a>
        <a href="?tipe=Karyawan" class="px-6 py-2 rounded border font-semibold {{ request('tipe') == 'Karyawan' ? 'bg-blue-700 text-white' : 'bg-white text-blue-700 border-blue-700' }}">KARYAWAN</a>
    </div>
    <div x-data="{ slide: 0, max: {{ $gurus->count() }} }" class="relative">
        <button @click="slide = Math.max(slide-1, 0)" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-2 z-10" :disabled="slide === 0">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        </button>
        <div class="flex transition-transform duration-300" :style="'transform: translateX(-' + (slide * 100) + '%)'">
            <template x-for="(guru, idx) in {{ $gurus->values() }}" :key="idx">
                <div class="w-full md:w-1/4 flex-shrink-0 px-2">
                    <div class="bg-white rounded-lg shadow flex flex-col items-center p-6">
                        <template x-if="guru.foto">
                            <img :src="'/storage/' + guru.foto" alt="Foto" class="w-32 h-40 object-cover rounded mb-2">
                        </template>
                        <template x-if="!guru.foto">
                            <img src="/img/avatar-default.png" alt="Avatar" class="w-32 h-40 object-cover rounded mb-2">
                        </template>
                        <div class="font-bold text-lg text-center" x-text="guru.nama"></div>
                        <div class="text-blue-700 text-sm font-semibold text-center" x-text="guru.jabatan"></div>
                        <div class="text-yellow-500 text-xs text-center mt-1" x-text="guru.deskripsi"></div>
                    </div>
                </div>
            </template>
        </div>
        <button @click="slide = Math.min(slide+1, max-1)" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-2 z-10" :disabled="slide === max-1">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </button>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection 