@extends('layouts.main')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')
    <section class="mx-auto flex max-w-2xl flex-col items-center px-6 py-24 text-center">
        <p class="font-display text-8xl font-extrabold text-spice-500">404</p>
        <h1 class="mt-4 text-3xl font-bold text-maroon-700">Halaman Tidak Ditemukan</h1>
        <p class="mt-3 text-lg text-coffee-600">Maaf, halaman yang Anda cari tidak ada di BagelenGoo.</p>
        <a href="{{ route('home') }}" class="btn-primary mt-8">Kembali ke Beranda</a>
    </section>
@endsection