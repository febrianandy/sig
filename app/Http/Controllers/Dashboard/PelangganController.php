<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{

    public function index()

    {
        $pelanggan = Pelanggan::all();
        $title = "Pelanggan";
        return view('pages/users/dashboard_users', compact('pelanggan','title'));
    }

    public function tambah(){
        $title = "Tambah Pelanggan";

        return view('pages/users/dashboard_input_user', compact('title'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
            'email' => 'required|email',
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $validatedData['nama'];
        $pelanggan->alamat = $validatedData['alamat'];
        $pelanggan->no_telfon = $validatedData['no_telfon'];
        $pelanggan->email = $validatedData['email'];
        $pelanggan->save();

        return redirect()->back()->with('success', 'Data pelanggan berhasil ditambahkan.');
    }
    public function edit($id)

    {
        $pelanggan = Pelanggan::find($id);
        $title = "Edit Pelanggan";
        return view('pages/users/dashboard_edit_user', compact('pelanggan','title'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
            'email' => 'required|email',
        ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama = $validatedData['nama'];
        $pelanggan->alamat = $validatedData['alamat'];
        $pelanggan->no_telfon = $validatedData['no_telfon'];
        $pelanggan->email = $validatedData['email'];
        $pelanggan->save();

        return redirect()->back()->with('success', 'Data barang berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();

        return redirect()->back()->with('success', 'Data pelanggan berhasil dihapus.');
    }
}
