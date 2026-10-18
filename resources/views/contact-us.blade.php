@extends('layouts.main')

@section('title', 'Hubungi Kami')

@section('content')
    <section class="bg-coffee-800 text-cream-50">
        <div class="mx-auto max-w-6xl px-6 py-14">
            <h1 class="text-4xl font-bold md:text-5xl">Contact <span class="text-spice-400">Us</span></h1>
            <p class="mt-4 max-w-2xl text-lg text-cream-200">Hubungi BagelenGoo, kami siap membantu pesananmu.</p>
        </div>
    </section>

    <section class="section">
        <div class="grid gap-6 md:grid-cols-2">
            <div class="card card-hover">
                <div class="text-3xl">💬</div>
                <h2 class="mt-3 text-xl font-bold text-maroon-700">WhatsApp</h2>
                <p class="mt-1 text-coffee-600">0812-108-2088</p>
                <a href="https://wa.me/628121082088" target="_blank" class="btn-primary mt-5">Chat Sekarang</a>
            </div>

            <div class="card card-hover">
                <div class="text-3xl">✉️</div>
                <h2 class="mt-3 text-xl font-bold text-maroon-700">Email</h2>
                <p class="mt-1 text-coffee-600">info@bagelengoo.com</p>
                <a href="mailto:info@bagelengoo.com" class="btn-secondary mt-5">Kirim Email</a>
            </div>
        </div>
    </section>
@endsection