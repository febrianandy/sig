<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barangs;
use App\Models\PenerimaanBarang;
use App\Models\PengeluaranBarang;

class BarangController extends Controller
{
    private $barang;

    public function __construct()
    {
        $this->barang = new Barangs();
    }

    public function getAllBarang()
    {
        $data = $this->barang->all();
        return view('barang.index', ['data' => $data]);
    }

    public function postBarang(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'stock' => 'required',
        ]);

        try {
            // Create a new instance of the model
            $model = new Barangs();
            // Assign values from the validated request data to the model's properties
            $model->nama_barang = $validatedData['nama_barang'];
            $model->kode_barang = $validatedData['kode_barang'];
            $model->deskripsi = $validatedData['deskripsi'];
            $model->harga = $validatedData['harga'];
            $model->kategori = $validatedData['kategori'];
            $model->satuan = $validatedData['satuan'];
            $model->stock = $validatedData['stock'];
            $model->save();
            // Set success message
            $message = 'Product code inserted successfully';
        } catch (\Exception $e) {
            // Set error message
            $message = 'Error inserting product code: ' . $e->getMessage();
        }
        // Save the model to insert the data
        return back()->with('pesanBarang', $message);
    }

    public function postPenerimaanBarang(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'barang_id' => 'required',
            'no_penerimaan' => 'required',
            'kode_barang' => 'required',
            'tanggal_penerimaan' => 'required',
            'jumlah' => 'required'
        ]);

        try {
            // Create a new instance of the model
            $model = new PenerimaanBarang();
            // Assign values from the validated request data to the model's properties
            $model->barang_id = $validatedData['barang_id'];
            $model->no_penerimaan = $validatedData['no_penerimaan'];
            $model->kode_barang = $validatedData['kode_barang'];
            $model->tanggal_penerimaan = $validatedData['tanggal_penerimaan'];
            $model->jumlah = $validatedData['jumlah'];


            $barang = Barangs::where([
                ['id', $validatedData['barang_id']],
                ['kode_barang', $validatedData['kode_barang']]
            ])->first();
            
            if ($barang) {
                $barang->stock += $validatedData['jumlah'];
                $barang->save();
            } else {
                echo "error";
            }

            $model->save();
            // Set success message
            $message = 'Sukses input peneriman barang';
        } catch (\Exception $e) {
            // Set error message
            $message = 'Error inserting product code: ' . $e->getMessage();
        }
        // Save the model to insert the data
        return back()->with('penerimaanBarang', $message);
    }


    public function postPengeluaranBarang(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'barang_id' => 'required',
            'no_pengeluaran' => 'required',
            'kode_barang' => 'required',
            'tanggal_pengeluaran' => 'required',
            'jumlah' => 'required'
        ]);

        try {
            // Create a new instance of the model
            $model = new PengeluaranBarang();
            // Assign values from the validated request data to the model's properties
            $model->barang_id = $validatedData['barang_id'];
            $model->no_pengeluaran = $validatedData['no_pengeluaran'];
            $model->kode_barang = $validatedData['kode_barang'];
            $model->tanggal_pengeluaran = $validatedData['tanggal_pengeluaran'];
            $model->jumlah = $validatedData['jumlah'];


            $barang = Barangs::where([
                ['id', $validatedData['barang_id']],
                ['kode_barang', $validatedData['kode_barang']]
            ])->first();
            
            if ($barang) {
                $barang->stock -= $validatedData['jumlah'];
                $barang->save();
            } else {
                echo "error";
            }

            $model->save();
            // Set success message
            $message = 'Sukses input pengeluaran barang';
        } catch (\Exception $e) {
            // Set error message
            $message = 'Error inserting product code: ' . $e->getMessage();
        }
        // Save the model to insert the data
        return back()->with('pengeluaranBarang', $message);
    }


    public function editBarang(Request $request, string $id)
    {
        $barang = Barangs::find($id);
        if (!$barang) {
            abort(404, 'Barang not found');
        }
        return view('pages/barang/dashboard_barang_edit', ['title' => "edit barang", 'barang' => $barang]);
    }

    public function aksiEditBarang(Request $request, $id)
    {
        // Retrieve the barang by its ID
        $barang = Barangs::find($id);

        if (!$barang) {
            // Handle the case where the barang is not found
            // You can return an error message or redirect as needed
            abort(404, 'Barang not found');
        }

        // Validate the request data
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'stock' => 'required',
        ]);

        try {
            // Update the barang data using the validated request data
            $barang->update($validatedData);
            // Set success message
            $message = 'Barang updated successfully';
        } catch (\Exception $e) {
            // Set error message
            $message = 'Error updating barang: ' . $e->getMessage();
        }

        // Redirect back with success message
        return redirect()->back()->with('errorEditBarang', $message);
    }

    public function deleteBarang($id)
    {
        // Retrieve the barang by its ID
        $barang = Barangs::find($id);

        if (!$barang) {
            // Handle the case where the barang is not found
            // You can return an error message or redirect as needed
            abort(404, 'Barang not found');
        }

        // Delete the barang
        $barang->delete();

        // Set success message
        $message = 'Barang deleted successfully';

        // Redirect back with success message
        return redirect()->back()->with('pesanBarang', $message);
    }
}
