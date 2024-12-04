<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function petugasPage(){
        $petugas = User::where('usertype', 'petugas')->get();
        return view('admin.petugas', [
            'petugas' => $petugas,
        ])->with(compact('petugas'));
    }

    public function inpetugas(){
        return view('admin.tambah.tambah-petugas');
    }

    public function addpetugas(Request $request){
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255'],
            'alamat' => ['required'],
            'usertype' => ['required'],
            'nomor_hp' => ['required', 'max:15'],
            'status' => ['required', 'max:11'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'usertype' => $request->usertype,
            'nomor_hp' => $request->nomor_hp,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.petugas');
    }
}
