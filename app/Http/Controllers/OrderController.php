<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_transaksi = Order::all();
        return view('admin.transaksi.index', compact('list_transaksi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_menu = Menu::all();
        return view('admin.transaksi.create', compact('list_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required',
            'jumlah.*'       => 'required',
            'status'         => 'required',
            'deskripsi'      => 'required',
            // 'total'     => 'required',
        ]);
        date_default_timezone_set('Asia/Jakarta');
                                                   //Mengambil data request dari array
        $menu_id   = $request->input('menu_id');   // Mendapatkan array menu_id
        $jumlah    = $request->input('jumlah');    // Mendapatkan array jumlah
        $status    = $request->input('status');    // Mendapatkan status
        $deskripsi = $request->input('deskripsi'); // Mendapatkan deskripsi

        // $total     = $request->input('total');     // Mendapatkan total

        // $data = [
        //     'menu_id'   => $menu_id,
        //     'jumlah'    => $jumlah,
        //     'status'    => $status,
        //     'deskripsi' => $deskripsi,
        //     'total'     => $total,
        // ];
        $total = 0;

        $order = Order::create([
            'user_id'        => auth()->user()->id,
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'total'          => 0,
            'status'         => $validated['status'],
            'deskripsi'      => $validated['deskripsi'],
        ]);

        foreach ($menu_id as $index => $menu_id) {
            $list_menu = Menu::all();
            $menu      = Menu::find($menu_id);
            $subtotal  = $jumlah[$index] * $menu->harga;
            $total += $subtotal;
            OrderItem::create([
                'menu_id'      => $menu_id,
                'jumlah'       => $jumlah[$index],
                'harga_satuan' => $menu->harga,
                // 'total'     => $total,
                'order_id'     => $order->id,
                'subtotal'     => $subtotal,
            ]);
        }
        $order->total = $total;
        $order->save();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order      = Order::find($id);
        $order_item = OrderItem::where('order_id', $id)->get();
        return view('admin.transaksi.show', compact('order', 'order_item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        return view('admin.transaksi.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order         = Order::find($id);
        $validatedData = $request->validate([
            'nama_pelanggan' => 'nullable',
            'deskripsi'      => 'nullable',
            'status'         => 'nullable',
            'jumlah'         => 'nullable',
        ]);
        $order->update($validatedData);

        // $order->status = $request->status;
        $order->update();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order_item = OrderItem::where('order_id', $id);
        $order_item->delete();

        $order = Order::find($id);
        $order->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil DIhapus!');

    }
}
