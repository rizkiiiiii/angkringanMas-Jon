<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_menu = Menu::all();
        return view('admin.menu.index', compact('list_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'harga'     => 'required',
            'kategori'  => 'in:Makanan,Minuman',
        ]);

        Menu::create($validated);
        return redirect()->route('menu.index')->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list_menu = Menu::find($id);
        return view('admin.menu.show', compact('list_menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $list_menu = Menu::find($id);
        return view('admin.menu.edit', compact('list_menu'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $list_menu = Menu::find($id);
        $validated = $request->validate([
            'nama_menu' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'harga'     => 'required',
            'kategori'  => 'in:Makanan,Minuman',
            ]);
            $list_menu->update($validated);
            return redirect()->route('menu.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
