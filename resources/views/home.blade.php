@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    {{-- Hero --}}
    <section class="bg-linear-to-br from-cream-100 via-cream-200 to-cream-300">
        <div class="mx-auto grid max-w-6xl items-center gap-10 px-6 py-16 md:grid-cols-2 md:py-24">
            <div>
                <span class="badge">UMKM Kuliner Lokal</span>
                <h1 class="mt-4 text-4xl font-extrabold leading-tight text-maroon-700 md:text-5xl">
                    Selamat Datang di <span class="text-spice-600">BagelenGoo!</span>
                </h1>
                <p class="mt-4 text-lg text-coffee-600">
                    Website resmi pemesanan kue bagelen lezat, renyah, dan terpercaya.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('product.index') }}" class="btn-primary">Lihat Produk</a>
                    <a href="{{ route('about') }}" class="btn-outline">Tentang Kami</a>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex h-64 w-64 items-center justify-center rounded-full border-8 border-cream-50 bg-coffee-700 text-8xl shadow-2xl shadow-coffee-900/30 md:h-80 md:w-80 md:text-9xl">
                    🥖
                </div>
            </div>
        </div>
    </section>

    {{-- Keunggulan --}}
    <section class="section">
        <h2 class="section-title text-center">Kenapa BagelenGoo?</h2>
        <p class="section-lead mx-auto text-center">Camilan klasik dengan rasa yang bikin ketagihan.</p>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            <div class="card card-hover text-center">
                <div class="text-4xl">✨</div>
                <h3 class="mt-3 text-xl font-bold text-maroon-700">Renyah Maksimal</h3>
                <p class="mt-2 text-coffee-600">Dipanggang dua kali agar tekstur renyah dan tahan lama.</p>
            </div>
            <div class="card card-hover text-center">
                <div class="text-4xl">🧈</div>
                <h3 class="mt-3 text-xl font-bold text-maroon-700">Bahan Pilihan</h3>
                <p class="mt-2 text-coffee-600">Menggunakan bahan berkualitas untuk rasa yang gurih dan legit.</p>
            </div>
            <div class="card card-hover text-center">
                <div class="text-4xl">🎁</div>
                <h3 class="mt-3 text-xl font-bold text-maroon-700">Banyak Varian</h3>
                <p class="mt-2 text-coffee-600">Berbagai varian rasa khas, cocok untuk oleh-oleh maupun hampers.</p>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="mx-auto max-w-6xl px-6">
        <div class="rounded-3xl bg-maroon-700 px-8 py-12 text-center text-cream-50 shadow-xl">
            <h2 class="text-3xl font-bold">Siap memesan bagelen favoritmu?</h2>
            <p class="mx-auto mt-3 max-w-xl text-cream-200">Hubungi kami lewat WhatsApp dan kami siap melayani pesananmu.</p>
            <a href="{{ route('contact') }}" class="btn-primary mt-6">Hubungi Kami</a>
        </div>
    </section>
@endsection