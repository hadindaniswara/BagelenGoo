@extends('layouts.main')

@section('content')
<section class="mx-auto w-full max-w-6xl px-6 py-10">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h1 class="font-display text-3xl font-bold text-maroon-700">Daftar Order (Admin)</h1>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="rounded-lg border border-coffee-900 px-4 py-2 text-sm font-medium hover:bg-cream-200">
                Logout
            </button>
        </form>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-lg border border-green-300 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-8 grid gap-4 md:grid-cols-4">
        <div class="rounded-xl bg-white p-5 shadow">
            <p class="text-sm text-coffee-900/70">Total Order</p>
            <p class="font-display text-3xl font-bold text-maroon-700">{{ $summary['total_orders'] }}</p>
        </div>
        <div class="rounded-xl bg-white p-5 shadow">
            <p class="text-sm text-coffee-900/70">Pendapatan (completed)</p>
            <p class="font-display text-2xl font-bold text-maroon-700">
                Rp {{ number_format($summary['total_revenue'], 0, ',', '.') }}
            </p>
        </div>
        <div class="rounded-xl bg-white p-5 shadow">
            <p class="mb-1 text-sm text-coffee-900/70">Per Status</p>
            @forelse ($summary['by_status'] as $status => $count)
                <p class="text-sm">{{ ucfirst($status) }}: <b>{{ $count }}</b></p>
            @empty
                <p class="text-sm">-</p>
            @endforelse
        </div>
        <div class="rounded-xl bg-white p-5 shadow">
            <p class="mb-1 text-sm text-coffee-900/70">Top Customer</p>
            @forelse ($summary['top_customers'] as $name => $total)
                <p class="text-sm">{{ $name }}: <b>Rp {{ number_format($total, 0, ',', '.') }}</b></p>
            @empty
                <p class="text-sm">-</p>
            @endforelse
        </div>
    </div>

    <div class="overflow-x-auto rounded-xl bg-white shadow">
        <table class="w-full text-left text-sm">
            <thead class="bg-coffee-900 text-cream-100">
                <tr>
                    <th class="px-4 py-3">Kode</th>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    @php
                        $badge = match ($order->status) {
                            'completed'  => 'bg-green-100 text-green-800',
                            'processing' => 'bg-blue-100 text-blue-800',
                            'cancelled'  => 'bg-red-100 text-red-800',
                            default      => 'bg-yellow-100 text-yellow-800',
                        };
                    @endphp
                    <tr class="border-t border-coffee-900/10 hover:bg-cream-100">
                        <td class="px-4 py-3 font-medium">{{ $order->order_code }}</td>
                        <td class="px-4 py-3">{{ $order->customer->name }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $badge }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ $order->ordered_at->format('d M Y H:i') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.orders.show', $order) }}" class="font-medium text-maroon-700 hover:underline">Detail</a>
                                <a href="{{ route('admin.orders.edit', $order) }}" class="font-medium text-spice-500 hover:underline">Edit</a>
                                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST"
                                      onsubmit="return confirm('Hapus order ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-10 text-center text-coffee-900/70">Belum ada order.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection