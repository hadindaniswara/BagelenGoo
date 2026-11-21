<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // ===== ADMIN =====

    public function index()
    {
        $orders = Order::with('customer')->latest('ordered_at')->get();

        // Pemakaian Collection
        $summary = collect([
            'total_orders'  => $orders->count(),
            'total_revenue' => $orders->where('status', 'completed')->sum('total_price'),
            'by_status'     => $orders->groupBy('status')->map->count(),
            'top_customers' => $orders->groupBy('customer.name')
                                      ->map->sum('total_price')
                                      ->sortDesc()
                                      ->take(5),
        ]);

        return view('admin.orders.index', compact('orders', 'summary'));
    }

    public function show(Order $order)
    {
        $order->load(['customer', 'items.product']);
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
            'notes'  => 'nullable|string',
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil diupdate.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dihapus.');
    }

    // ===== CUSTOMER =====

    public function create()
    {
        return view('orders.create', ['products' => Product::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'               => 'required|string|max:100',
            'phone'              => 'required|string|max:20',
            'email'              => 'nullable|email|max:120',
            'address'            => 'nullable|string',
            'notes'              => 'nullable|string',
            'items'              => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity'   => 'required|integer|min:1',
        ]);

        $order = DB::transaction(function () use ($validated) {
            $customer = Customer::updateOrCreate(
                ['phone' => $validated['phone']],
                [
                    'name'    => $validated['name'],
                    'email'   => $validated['email'] ?? null,
                    'address' => $validated['address'] ?? null,
                ]
            );

            $items    = collect($validated['items']);
            $products = Product::whereIn('id', $items->pluck('product_id'))->get()->keyBy('id');
            $total    = $items->sum(fn ($i) => $products[$i['product_id']]->price * $i['quantity']);

            $order = Order::create([
                'customer_id' => $customer->id,
                'order_code'  => 'ORD-' . strtoupper(Str::random(8)),
                'total_price' => $total,
                'notes'       => $validated['notes'] ?? null,
            ]);

            $order->items()->createMany(
                $items->map(fn ($i) => [
                    'product_id' => $i['product_id'],
                    'quantity'   => $i['quantity'],
                    'price'      => $products[$i['product_id']]->price,
                ])->all()
            );

            return $order;
        });

        return redirect()->route('orders.success', $order->order_code);
    }

    public function success(Order $order)
    {
        $order->load('customer');
        return view('orders.success', compact('order'));
    }
}