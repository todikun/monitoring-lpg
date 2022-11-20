<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.master.user.index', compact('users'));
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('pages.master.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
        ]);

        if (!is_null($request->password)) {        
            User::find($id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
        } else {   
            User::find($id)->update([
                'name' => $request->name,
                'username' => $request->username
            ]);
        }
        return redirect()->route('user.index')->with('status', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('status', 'Data berhasil dihapus!');
    }
}
