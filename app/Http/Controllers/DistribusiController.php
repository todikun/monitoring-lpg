<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\{LpgDistribusi, ItemDistribusi, LpgMasuk, Pangkalan};

class DistribusiController extends Controller
{
    public function index()
    {
        $distribusi = LpgDistribusi::where('status', '<>', 'none')->get();
        return view('pages.distribusi.index', compact('distribusi'));
    }

    public function store()
    {
        $distribusi = LpgDistribusi::create([
            'kode_trx' => 'TRXLPG-' . Str::random(7) . random_int(1000000, 9999999),
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'status' => 'none'
        ]);

        $items = ItemDistribusi::where('distribusi_id', $distribusi->id)->get();
        return view('pages.distribusi.tujuan.index', compact('distribusi', 'items'));
    }

    public function show($id)
    {
        $distribusi = LpgDistribusi::find($id);
        $items = ItemDistribusi::where('distribusi_id', $id)->get();

        return view('pages.distribusi.show', compact('distribusi', 'items'));
    }

    public function edit($id)
    {
        $distribusi = LpgDistribusi::find($id);
        $items = ItemDistribusi::where('distribusi_id', $id)->get();

        return view('pages.distribusi.edit', compact('distribusi', 'items'));
    }

    public function addTujuan($id)
    {
        $pangkalan = Pangkalan::all();
        $distribusi = LpgDistribusi::find($id);

        return view('pages.distribusi.tujuan.create', compact('pangkalan', 'distribusi'));
    }

    public function storeTujuan(Request $request)
    {
        $request->validate([
            'qty' => 'required'
        ]);

        // validasi stok
        $stok = DB::table('lpg_masuks')->sum('jumlah');
        $qty = DB::table('item_distribusis')->sum('qty');
        $total = $stok - $qty;

        if ($total < $request->qty) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        // validasi pangkalan
        $pangkalan = DB::table('item_distribusis')->where('pangkalan_id', $request->pangkalan_id)->first();
        if (is_null($pangkalan)) {
            ItemDistribusi::create([
                'distribusi_id' => $request->distribusi_id,
                'pangkalan_id' => $request->pangkalan_id,
                'qty' => $request->qty
            ]);
        } else {
            return back()->with('error', 'Pangkalan sudah ditambahkan!');
        }

        $distribusi = LpgDistribusi::find($request->distribusi_id);
        $items = ItemDistribusi::where('distribusi_id', $request->distribusi_id)->get();

        return view('pages.distribusi.tujuan.index', compact('distribusi', 'items'));
    }

    public function destroyTujuan(Request $request, $id)
    {
        // delete
        $tujuan = ItemDistribusi::find($id);
        $tujuan->delete();

        // passing data
        $distribusi = LpgDistribusi::find($request->distribusi_id);
        $items = ItemDistribusi::where('distribusi_id', $request->distribusi_id)->get();

        return view('pages.distribusi.tujuan.index', compact('distribusi', 'items'));
    }

    public function submitTujuan($id)
    {
        $tujuan = ItemDistribusi::where('distribusi_id', $id)->get()->count();
        if ($tujuan > 0) {
            LpgDistribusi::find($id)->update([
                'status' => 'Draft'
            ]);
        }
        return redirect(route('distribusi.index'));
    }

    public function listPengajuan()
    {
        $distribusi = LpgDistribusi::where('status', '<>', 'none')->where('status', '<>', 'Draft')->get();
        return view('pages.distribusi.pengajuan', compact('distribusi'));
    }

    public function ajukanTransaksi(Request $request, $id)
    {
        LpgDistribusi::find($id)->update([
            'status' => 'Diajukan',
            'keterangan' => '-'
        ]);


        return back()->with('status', 'Distribusi dengan kode ' . $request->kode_trx . ' berhasil diajukan!');
    }

    public function setujuiTransaksi(Request $request, $id)
    {
        LpgDistribusi::find($id)->update([
            'status' => 'Disetujui',
            'keterangan' => '-'
        ]);

        return back()->with('status', 'Distribusi dengan kode ' . $request->kode_trx . ' berhasil disetujui!');
    }

    public function formTolakTransaksi($id)
    {
        $data = LpgDistribusi::find($id);
        return view('pages.distribusi.pengajuan-tolak', compact('data'));
    }

    public function tolakTransaksi(Request $request, $id)
    {
        LpgDistribusi::find($id)->update([
            'status' => 'Ditolak',
            'keterangan' => $request->keterangan
        ]);

        return redirect(route('manajer.index'))->with('error', 'Distribusi dengan kode ' . $request->kode_trx . ' berhasil ditolak!');
    }

    public function jadwalPengiriman()
    {
        $distribusi = LpgDistribusi::where('status', 'Disetujui')->orderBy('created_at', 'desc')->get();
        return view('pages.distribusi.jadwal', compact('distribusi'));
    }

    public function suratJalan($id)
    {
        $distribusi = LpgDistribusi::find($id);
        $items = ItemDistribusi::where('distribusi_id', $id)->get();

        return view('pages.dokumen.surat', compact('distribusi', 'items'));
    }
}
