<?php

namespace App\Http\Controllers;

use App\Models\LpgMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangMasukController extends Controller
{
    public function index()
    {
        $datas = LpgMasuk::all();

        return view('pages.barang-masuk.index', compact('datas'));
    }

    public function create()
    {
        return view('pages.barang-masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        // dd($request);

        LpgMasuk::create([
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal
        ]);

        return redirect()->route('barang.index')->with('status', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = LpgMasuk::find($id);

        return view('pages.barang-masuk.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required'
        ]);

        LpgMasuk::find($id)->update([
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('barang.index')->with('status', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barang = LpgMasuk::find($id);
        $barang->delete();

        return back()->with('status', 'Data berhasil dihapus!');
    }
}
