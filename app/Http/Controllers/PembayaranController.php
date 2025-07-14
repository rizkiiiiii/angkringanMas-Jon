<?php
namespace App\Http\Controllers;

use App\Models\Order;

class PembayaranController extends Controller
{
    public function index()
    {
        $list_transaksi = Order::where('status', 'Berhasil')->get();
        return view('admin.pembayaran.index', compact('list_transaksi'));
    }
}
