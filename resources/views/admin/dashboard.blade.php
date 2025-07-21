@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>
    <ul class="list-disc ml-6">
        <li><a href="{{ route('berita.index') }}" class="text-blue-600 hover:underline">Kelola Berita</a></li>
        <!-- Tambah link ke fitur lain di sini -->
    </ul>
</div>
@endsection 