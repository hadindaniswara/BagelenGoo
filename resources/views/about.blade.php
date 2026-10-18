@extends('layouts.main')

@section('title', 'Tentang')

@section('content')
    <section class="bg-coffee-800 text-cream-50">
        <div class="mx-auto max-w-6xl px-6 py-14">
            <h1 class="text-4xl font-bold md:text-5xl">Tentang <span class="text-spice-400">BagelenGoo</span></h1>
            <p class="mt-4 max-w-2xl text-lg text-cream-200">
                BagelenGoo adalah UMKM kuliner spesialis kue bagelen renyah dengan berbagai varian rasa khas.
            </p>
        </div>
    </section>

    <section class="section">
        <h2 class="section-title">Nilai Kami</h2>
        <div class="mt-8 grid gap-6 md:grid-cols-3">
            <div class="card card-hover">
                <div class="text-3xl">🌾</div>
                <h3 class="mt-3 text-xl font-bold text-maroon-700">Kualitas</h3>
                <p class="mt-2 text-coffee-600">Setiap bagelen dibuat dari bahan pilihan dan diproses dengan teliti.</p>
            </div>
            <div class="card card-hover">
                <div class="text-3xl">🤝</div>
                <h3 class="mt-3 text-xl font-bold text-maroon-700">Lokal</h3>
                <p class="mt-2 text-coffee-600">Mendukung usaha lokal dan melestarikan jajanan tradisional.</p>
            </div>
            <div class="card card-hover">
                <div class="text-3xl">❤️</div>
                <h3 class="mt-3 text-xl font-bold text-maroon-700">Sepenuh Hati</h3>
                <p class="mt-2 text-coffee-600">Kepuasan pelanggan adalah prioritas utama kami.</p>
            </div>
        </div>
    </section>
@endsection