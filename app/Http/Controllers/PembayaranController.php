<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class PembayaranController extends Controller
{
    public function index()
    {
        $list_transaksi = Order::where('status', 'Berhasil')->get();
        return view('admin.pembayaran.index', compact('list_transaksi'));
    }
    public function exportPdf()
    {
        //Mengambil data status transaksi yang berhasil
        $list_transaksi = Order::where('status', 'berhasil')->get();

        $pdf = Pdf::loadView('admin.pembayaran.pdf', compact('list_transaksi'));
        return $pdf->download('laporan_pembayaran.pdf');
    }
}
