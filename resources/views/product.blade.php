@extends('layouts.main')

@section('title', 'Produk')

@php
    $products = [
        ['slug' => 'original', 'name' => 'Bagelen Original', 'emoji' => '🥖', 'tag' => 'Best Seller', 'desc' => 'Rasa klasik gurih manis dengan aroma mentega yang harum.'],
        ['slug' => 'cokelat',  'name' => 'Bagelen Cokelat',  'emoji' => '🍫', 'tag' => 'Favorit',     'desc' => 'Renyah dengan lapisan cokelat yang lumer dan manis.'],
        ['slug' => 'keju',     'name' => 'Bagelen Keju',     'emoji' => '🧀', 'tag' => 'Gurih',       'desc' => 'Gurih asin keju yang pas di setiap gigitan.'],
        ['slug' => 'pandan',   'name' => 'Bagelen Pandan',   'emoji' => '🌿', 'tag' => 'Wangi',       'desc' => 'Aroma pandan yang segar dengan rasa manis lembut.'],
        ['slug' => 'kopi',     'name' => 'Bagelen Kopi',     'emoji' => '☕', 'tag' => 'Bold',        'desc' => 'Perpaduan renyah dan aroma kopi yang khas.'],
        ['slug' => 'bawang',   'name' => 'Bagelen Bawang',   'emoji' => '🧄', 'tag' => 'Savory',      'desc' => 'Gurih bawang putih, cocok jadi teman minum teh.'],
    ];

    $selected = isset($slug) ? collect($products)->firstWhere('slug', $slug) : null;
    $selectedName = $selected['name'] ?? (isset($slug) ? 'Bagelen ' . ucfirst(str_replace('-', ' ', $slug)) : null);
    $waText = isset($slug) ? rawurlencode("Halo BagelenGoo, saya ingin memesan {$selectedName}.") : '';
@endphp

@section('content')
    <section class="bg-coffee-800 text-cream-50">
        <div class="mx-auto max-w-6xl px-6 py-14">
            <h1 class="text-4xl font-bold md:text-5xl">Katalog Produk <span class="text-spice-400">BagelenGoo</span></h1>
            <p class="mt-4 max-w-2xl text-lg text-cream-200">Pilih berbagai varian rasa kue bagelen favoritmu di bawah ini.</p>
        </div>
    </section>

    {{-- Detail produk (jika ada slug) --}}
    @if (isset($slug))
        <section class="section pb-0">
            <div class="card flex flex-col items-center gap-6 border-2 border-spice-500 md:flex-row">
                <div class="flex h-32 w-32 shrink-0 items-center justify-center rounded-2xl bg-cream-200 text-6xl">
                    {{ $selected['emoji'] ?? '🥖' }}
                </div>
                <div class="text-center md:text-left">
                    <span class="badge">Detail Produk</span>
                    <h2 class="mt-2 text-2xl font-bold text-maroon-700">{{ $selectedName }}</h2>
                    <p class="mt-2 text-coffee-600">
                        {{ $selected['desc'] ?? 'Ini adalah halaman rincian untuk produk ' . e($slug) . '.' }}
                    </p>
                    <div class="mt-4 flex flex-wrap justify-center gap-3 md:justify-start">
                        <a href="https://wa.me/6281234567890?text={{ $waText }}" target="_blank" class="btn-primary">Pesan via WhatsApp</a>
                        <a href="{{ route('product.index') }}" class="btn-outline">Kembali ke Katalog</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Daftar produk --}}
    <section class="section">
        <h2 class="section-title">{{ isset($slug) ? 'Varian Lainnya' : 'Semua Varian' }}</h2>

        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($products as $product)
                <a href="{{ route('product.show', $product['slug']) }}" class="card card-hover block">
                    <div class="flex h-32 items-center justify-center rounded-xl bg-cream-200 text-6xl">
                        {{ $product['emoji'] }}
                    </div>
                    <span class="badge mt-4">{{ $product['tag'] }}</span>
                    <h3 class="mt-2 text-xl font-bold text-maroon-700">{{ $product['name'] }}</h3>
                    <p class="mt-1 text-sm text-coffee-600">{{ $product['desc'] }}</p>
                    <span class="mt-4 inline-block text-sm font-semibold text-spice-600">Lihat detail &rarr;</span>
                </a>
            @endforeach
        </div>
    </section>
@endsection