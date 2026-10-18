@extends('layouts.main')

@section('title', 'Tim Kami')

@section('content')
    <section class="bg-coffee-800 text-cream-50">
        <div class="mx-auto max-w-6xl px-6 py-14">
            <h1 class="text-4xl font-bold md:text-5xl">Our <span class="text-spice-400">Team</span></h1>
            <p class="mt-4 max-w-2xl text-lg text-cream-200">
                Tim Pengembang BagelenGoo: Hadin Daniswara &amp; Rekan Tim.
            </p>
        </div>
    </section>

    <section class="section">
        @if (isset($name))
            <div class="card border-2 border-spice-500">
                <span class="badge">Profil Tim</span>
                <h2 class="mt-2 text-2xl font-bold text-maroon-700">{{ ucfirst($name) }}</h2>
                <p class="mt-2 text-coffee-600">Anggota tim pengembang proyek BagelenGoo.</p>
                <a href="{{ route('team') }}" class="btn-outline mt-5">Lihat Semua Tim</a>
            </div>
        @else
            <div class="grid gap-6 md:grid-cols-2">
                <a href="{{ route('team', 'hadin') }}" class="card card-hover block text-center">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-maroon-700 text-3xl text-cream-50">H</div>
                    <h3 class="mt-4 text-xl font-bold text-maroon-700">Hadin Daniswara</h3>
                    <p class="text-sm text-coffee-600">Pengembang</p>
                </a>
                <div class="card text-center">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-spice-500 text-3xl text-white">+</div>
                    <h3 class="mt-4 text-xl font-bold text-maroon-700">Regina Salsabilla</h3>
                    <p class="text-sm text-coffee-600">Pengembang</p>
                </div>
            </div>
        @endif
    </section>
@endsection