<?php

namespace App\Http\Controllers;

use App\Models\Pangkalan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PangkalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pangkalan = Pangkalan::all();
        return view('pages.master.pangkalan.index', compact('pangkalan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.master.pangkalan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ]);


        Pangkalan::create([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('pangkalan.index')->with('status', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pangkalan::find($id);
        return view('pages.master.pangkalan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ]);

        Pangkalan::find($id)->update([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('pangkalan.index')->with('status', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pangkalan = Pangkalan::find($id);
        $pangkalan->delete();

        return redirect()->route('pangkalan.index')->with('status', 'Data berhasil dihapus!');
    }
}
