@extends('layouts.main')

@section('content')
<section class="mx-auto w-full max-w-2xl px-6 py-10">
    <h1 class="mb-6 font-display text-3xl font-bold text-maroon-700">Edit Order {{ $order->order_code }}</h1>

    @if ($errors->any())
        <div class="mb-6 rounded-lg border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-6 rounded-xl bg-white p-6 shadow">
        @csrf @method('PUT')

        <div>
            <label class="mb-1 block text-sm font-medium">Status</label>
            <select name="status"
                    class="w-full rounded-lg border border-coffee-900/20 px-3 py-2 focus:border-spice-500 focus:outline-none">
                @foreach (['pending', 'processing', 'completed', 'cancelled'] as $status)
                    <option value="{{ $status }}" @selected(old('status', $order->status) === $status)>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium">Catatan</label>
            <textarea name="notes" rows="3"
                      class="w-full rounded-lg border border-coffee-900/20 px-3 py-2 focus:border-spice-500 focus:outline-none">{{ old('notes', $order->notes) }}</textarea>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit"
                    class="rounded-lg bg-spice-500 px-5 py-2 text-sm font-semibold text-white shadow transition hover:opacity-90">
                Update
            </button>
            <a href="{{ route('admin.orders.index') }}" class="text-sm font-medium hover:underline">Batal</a>
        </div>
    </form>
</section>
@endsection