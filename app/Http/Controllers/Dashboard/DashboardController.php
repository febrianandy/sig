<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Barangs;
use App\Models\KodeBarang;
use App\Models\PenerimaanBarang;
use App\Models\PengeluaranBarang;
use Dompdf\Dompdf;

class DashboardController extends Controller
{
    private $barang;
    public function __construct()
    {
        $this->barang = new Barangs();
    }
    public function index(){
        $data = $this->barang->all();
        return view('pages/index', ['barang' => $data]);
    }
    public function dashboard()
    {
        $data = $this->barang->all();
        $penerimaan = count(PenerimaanBarang::getPenerimaan());
        $pengeluaran = count(PengeluaranBarang::getPengeluaran());
        $title = 'Dashboard';
        return view('pages/dashboard', ['title' => $title, 'barang' => $data,'penerimaan'=> $penerimaan,'pengeluaran'=> $pengeluaran]);
    }

    public function exportPDFpenerimaan(Request $request)
    {

        $request->validate([
            'tanggal_penerimaan' => 'required',
            'tanggal_penerimaan_end' => 'required',
        ]);


        // Assign values from the validated request data to the model's properties
        $startDate = $request->input('tanggal_penerimaan');
        $endDate = $request->input('tanggal_penerimaan_end');

        // instantiate and use the dompdf class

        $penerimaanBarangs = PenerimaanBarang::getPenerimaanPDF($startDate, $endDate); // Replace with your actual model query
        $pdf = new Dompdf();


        $pdf->loadHtml(view('pages.laporan_penerimaan_barang', compact('penerimaanBarangs'))->render()); // Replace with your actual view name
        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $pdf->render();
        // Output the generated PDF to the browser
        $pdf->stream('penerimaanbarang.pdf', [
            'compress' => true,
            'Attachment' => true,
        ]);
        exit();
    }

    public function exportPDFpengeluaran(Request $request)
    {

        $request->validate([
            'tanggal_pengeluaran' => 'required',
            'tanggal_pengeluaran_end' => 'required',
        ]);


        // Assign values from the validated request data to the model's properties
        $startDate = $request->input('tanggal_pengeluaran');
        $endDate = $request->input('tanggal_pengeluaran_end');

        // instantiate and use the dompdf class

        $pengeluaranBarangs = PengeluaranBarang::getPengeluaranPDF($startDate, $endDate); // Replace with your actual model query
        $pdf = new Dompdf();


        $pdf->loadHtml(view('pages.laporan_pengeluaran_barang', compact('pengeluaranBarangs'))->render()); // Replace with your actual view name
        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $pdf->render();
        // Output the generated PDF to the browser
        $pdf->stream('pengeluaranbarang.pdf', [
            'compress' => true,
            'Attachment' => true,
        ]);
        exit();
    }

    public function penerimaan_barang()
    {
        $title = 'Penerimaan Barang';
        $data = $this->barang->all();
        $penerimaan = PenerimaanBarang::getPenerimaan();
        return view('pages/penerimaan/penerimaan_barang', ['title' => $title, 'barang' => $data, 'penerimaan' => $penerimaan]);
    }
    public function pengeluaran_barang()
    {
        $title = 'Pengeluaran Barang';
        $data = $this->barang->all();
        $pengeluaran = PengeluaranBarang::getPengeluaran();
        return view('pages/pengeluaran/pengeluaran_barang', ['title' => $title, 'barang' => $data, 'pengeluaran' => $pengeluaran]);
    }

    public function barang()
    {
        $data = $this->barang->all();
        $title = 'Barangs';
        return view('pages/barang/dashboard_barangs', ['title' => $title, 'barang' => $data]);
    }
    
    public function pageInputBarang()
    {
        $title = 'Input Barang';
        return view('pages/barang/dashboard_input_barang', ['title' => $title]);
    }

    public function pageLaporan()
    {
        $title = 'Laporan';
        $pengeluaran = PengeluaranBarang::getPengeluaran();
        $penerimaan = PenerimaanBarang::getPenerimaan();
        return view('pages/dashboard_laporan', ['title' => $title,'pengeluaran'=> $pengeluaran,'penerimaan'=> $penerimaan]);
    }
    public function pageUsers()
    {
        $title = 'Users';
        return view('pages/users/dashboard_users', ['title' => $title]);
    }
    public function logout()
    {
        Auth::logout();
        // Redirect to the login page or any desired location
        return redirect('/login');
    }
}
