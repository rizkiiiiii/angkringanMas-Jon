<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // Menampilkan form pemesanan
    public function create()
    {
        $menus = Menu::all()->groupBy('kategori');
        return view('orders.create', compact('menus'));
    }

    // Menyimpan pesanan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'items'            => 'required|array',
            'items.*.menu_id'  => 'required|exists:menus,id',
            'items.*.jumlah' => 'required|integer|min:1',
            'deskirpsi'            => 'nullable|string|max:500',
        ]);

        // Hitung total
        $total      = 0;
        $orderItems = [];

        foreach ($validated['items'] as $item) {
            if ($item['jumlah'] < 1) {
                continue;
            }

            $menu     = Menu::find($item['menu_id']);
            $subtotal = $menu->price * $item['jumlah'];

            $orderItems[] = [
                'menu_id'    => $menu->id,
                'jumlah'   => $item['jumlah'],
                'harga_satuan' => $menu->harga,
                'subtotal'   => $subtotal,
            ];

            $total += $subtotal;
        }

        if ($total <= 0) {
            return back()->with('error', 'Minimal pesan 1 menu');
        }

        // Buat order
        $order = Order::create([
            'id' => 'ORD-' . Str::upper(Str::random(8)),
            'user_id'      => auth()->id(),
            'total_amount' => $total,
            'notes'        => $validated['notes'] ?? null,
            'status'       => 'pending',
        ]);

        // Simpan order items
        $order->items()->createMany($orderItems);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Pesanan berhasil dibuat! Nomor pesanan: ' . $order->order_number);
    }

    // Menampilkan detail pesanan
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Daftar pesanan
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }
}
