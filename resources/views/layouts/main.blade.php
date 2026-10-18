@php
    $links = [
        ['label' => 'Beranda', 'href' => route('home'), 'active' => request()->routeIs('home')],
        ['label' => 'Tentang', 'href' => route('about'), 'active' => request()->routeIs('about')],
        ['label' => 'Produk', 'href' => route('product.index'), 'active' => request()->routeIs('product.*')],
        ['label' => 'Tim', 'href' => route('team'), 'active' => request()->routeIs('team')],
        ['label' => 'Kontak', 'href' => route('contact'), 'active' => request()->routeIs('contact')],
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kue Bagelen Renyah') | BagelenGoo</title>
    <meta name="description" content="@yield('description', 'BagelenGoo - UMKM kuliner spesialis kue bagelen renyah dengan berbagai varian rasa khas.')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col">

    {{-- ================= NAVBAR ================= --}}
    <header class="sticky top-0 z-50 border-b-4 border-maroon-700 bg-coffee-900 text-cream-100 shadow-lg">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="font-display text-2xl font-bold tracking-tight">
                Bagelen<span class="text-spice-400">Goo</span>
            </a>

            {{-- Desktop --}}
            <ul class="hidden items-center gap-1 md:flex">
                @foreach ($links as $link)
                    <li>
                        <a href="{{ $link['href'] }}"
                           class="rounded-lg px-4 py-2 text-sm font-medium transition
                                  {{ $link['active'] ? 'bg-spice-500 text-white' : 'text-cream-200 hover:bg-coffee-700 hover:text-white' }}">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Tombol mobile --}}
            <button id="menu-btn" type="button" class="rounded-lg p-2 hover:bg-coffee-700 md:hidden" aria-label="Buka menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>

        {{-- Menu mobile --}}
        <div id="mobile-menu" class="hidden border-t border-coffee-700 bg-coffee-800 px-6 py-3 md:hidden">
            <ul class="flex flex-col gap-1">
                @foreach ($links as $link)
                    <li>
                        <a href="{{ $link['href'] }}"
                           class="block rounded-lg px-4 py-2 text-sm font-medium
                                  {{ $link['active'] ? 'bg-spice-500 text-white' : 'text-cream-200 hover:bg-coffee-700' }}">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </header>

    {{-- ================= ISI HALAMAN ================= --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- ================= FOOTER ================= --}}
    <footer class="mt-16 bg-coffee-900 text-cream-200">
        <div class="mx-auto grid max-w-6xl gap-8 px-6 py-12 md:grid-cols-3">
            <div>
                <p class="font-display text-2xl font-bold text-cream-50">
                    Bagelen<span class="text-spice-400">Goo</span>
                </p>
                <p class="mt-3 text-sm text-coffee-300">
                    Kue bagelen renyah dengan berbagai varian rasa khas, dibuat dengan sepenuh hati.
                </p>
            </div>

            <div>
                <p class="font-semibold text-cream-50">Navigasi</p>
                <ul class="mt-3 space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-spice-400">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-spice-400">Tentang</a></li>
                    <li><a href="{{ route('product.index') }}" class="hover:text-spice-400">Produk</a></li>
                    <li><a href="{{ route('team') }}" class="hover:text-spice-400">Tim</a></li>
                </ul>
            </div>

            <div>
                <p class="font-semibold text-cream-50">Hubungi Kami</p>
                <ul class="mt-3 space-y-2 text-sm">
                    <li>WhatsApp: 0812-3456-7890</li>
                    <li>Email: info@bagelengoo.com</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-coffee-700 py-4 text-center text-xs text-coffee-300">
            &copy; {{ date('Y') }} BagelenGoo. Seluruh hak cipta dilindungi.
        </div>
    </footer>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        }
    </script>
</body>
</html>