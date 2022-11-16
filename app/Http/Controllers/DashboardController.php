<?php

namespace App\Http\Controllers;

use App\Models\LpgDistribusi;
use Illuminate\Support\Facades\DB;
use App\Models\Pangkalan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $lpg_masuk = DB::table('lpg_masuks')->sum('jumlah');
        $item_distribusis = DB::table('item_distribusis')->sum('qty');
        $stok = $lpg_masuk - $item_distribusis;

        $pangkalan = Pangkalan::all()->count();

        $date = Carbon::now()->format('Y-m-d');

        $distribusi = LpgDistribusi::where('status', 'Disetujui')->where('tanggal', $date)->get()->count();

        return view('index', compact('stok', 'pangkalan', 'distribusi'));
    }
}
