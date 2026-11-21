@extends('layouts.main')

@section('content')
<section class="mx-auto w-full max-w-xl px-6 py-16 text-center">
    <h1 class="mb-3 font-display text-3xl font-bold text-maroon-700">Terima kasih, {{ $order->customer->name }}!</h1>
    <p class="mb-2">Pesanan kamu sudah kami terima.</p>
    <p class="mb-6">Kode order: <b>{{ $order->order_code }}</b></p>
    <a href="{{ route('product.index') }}"
       class="rounded-lg bg-spice-500 px-5 py-2 text-sm font-semibold text-white shadow">
        Kembali ke Produk
    </a>
</section>
@endsection