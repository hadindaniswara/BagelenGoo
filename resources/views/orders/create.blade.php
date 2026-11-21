@extends('layouts.main')

@section('content')
<section class="mx-auto w-full max-w-2xl px-6 py-10">
    <h1 class="mb-6 font-display text-3xl font-bold text-maroon-700">Pesan Bagelen</h1>

    @if ($errors->any())
        <div class="mb-6 rounded-lg border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST" novalidate class="space-y-6 rounded-xl bg-white p-6 shadow">
        @csrf

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full rounded-lg border border-coffee-900/20 px-3 py-2 focus:border-spice-500 focus:outline-none">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">No. HP</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                       class="w-full rounded-lg border border-coffee-900/20 px-3 py-2 focus:border-spice-500 focus:outline-none">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">Email (opsional)</label>
                <input type="text" name="email" value="{{ old('email') }}"
                       class="w-full rounded-lg border border-coffee-900/20 px-3 py-2 focus:border-spice-500 focus:outline-none">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">Alamat (opsional)</label>
                <input type="text" name="address" value="{{ old('address') }}"
                       class="w-full rounded-lg border border-coffee-900/20 px-3 py-2 focus:border-spice-500 focus:outline-none">
            </div>
        </div>

        <div>
            <label class="mb-2 block text-sm font-medium">Item</label>
            <div id="items" class="space-y-3">
                <div class="item-row flex gap-3">
                    <select name="items[0][product_id]"
                            class="flex-1 rounded-lg border border-coffee-900/20 px-3 py-2 focus:border-spice-500 focus:outline-none">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="items[0][quantity]" value="1"
                           class="w-24 rounded-lg border border-coffee-900/20 px-3 py-2 focus:border-spice-500 focus:outline-none">
                </div>
            </div>
            <button type="button" id="add-item"
                    class="mt-3 rounded-lg border border-coffee-900 px-4 py-2 text-sm font-medium transition hover:bg-cream-200">
                + Tambah item
            </button>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">Catatan</label>
            <textarea name="notes" rows="3"
                      class="w-full rounded-lg border border-coffee-900/20 px-3 py-2 focus:border-spice-500 focus:outline-none">{{ old('notes') }}</textarea>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit"
                    class="rounded-lg bg-spice-500 px-5 py-2 text-sm font-semibold text-white shadow transition hover:opacity-90">
                Kirim Pesanan
            </button>
            <a href="{{ route('home') }}" class="text-sm font-medium hover:underline">Batal</a>
        </div>
    </form>
</section>

<script>
    let index = 1;
    document.getElementById('add-item').addEventListener('click', () => {
        const row = document.querySelector('.item-row').cloneNode(true);
        row.querySelector('select').name = `items[${index}][product_id]`;
        const qty = row.querySelector('input');
        qty.name = `items[${index}][quantity]`;
        qty.value = 1;
        document.getElementById('items').appendChild(row);
        index++;
    });
</script>
@endsection