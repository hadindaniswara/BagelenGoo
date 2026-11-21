@extends('layouts.main')

@section('content')
<section class="mx-auto w-full max-w-3xl px-6 py-10">
    <h1 class="mb-6 font-display text-3xl font-bold text-maroon-700">Order {{ $order->order_code }}</h1>

    <div class="mb-6 grid gap-2 rounded-xl bg-white p-6 text-sm shadow md:grid-cols-2">
        <p><span class="text-coffee-900/70">Customer:</span> <b>{{ $order->customer->name }}</b> ({{ $order->customer->phone }})</p>
        <p><span class="text-coffee-900/70">Status:</span> <b>{{ ucfirst($order->status) }}</b></p>
        <p><span class="text-coffee-900/70">Tanggal:</span> {{ $order->ordered_at->format('d M Y H:i') }}</p>
        <p><span class="text-coffee-900/70">Catatan:</span> {{ $order->notes ?? '-' }}</p>
    </div>

    <div class="overflow-x-auto rounded-xl bg-white shadow">
        <table class="w-full text-left text-sm">
            <thead class="bg-coffee-900 text-cream-100">
                <tr>
                    <th class="px-4 py-3">Produk</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Qty</th>
                    <th class="px-4 py-3 text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr class="border-t border-coffee-900/10">
                        <td class="px-4 py-3">{{ $item->product->name }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $item->quantity }}</td>
                        <td class="px-4 py-3 text-right">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="border-t-2 border-coffee-900/20 font-bold">
                    <td colspan="3" class="px-4 py-3 text-right">Total</td>
                    <td class="px-4 py-3 text-right text-maroon-700">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-6 flex items-center gap-4">
        <a href="{{ route('admin.orders.edit', $order) }}"
           class="rounded-lg bg-spice-500 px-5 py-2 text-sm font-semibold text-white shadow transition hover:opacity-90">Edit</a>
        <a href="{{ route('admin.orders.index') }}" class="text-sm font-medium hover:underline">Kembali</a>
    </div>
</section>
@endsection