<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_menu        = Menu::all()->count();
        $transaksi_proses   = Order::where('status', 'Proses')->get()->count();
        $transaksi_berhasil = Order::where('status', 'Berhasil')->get()->count();
        $total_keseluruhan  = Order::sum('total');
        return view('admin.index', compact('jumlah_menu', 'transaksi_proses', 'transaksi_berhasil'
            , 'total_keseluruhan'));
    }
}
