<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Outlet;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
    	$datas = $this->getData();
    	return view('main.laporan.index', compact('datas'));
    }

    private function getData($outlet = null)
    {
    	$result = Transaksi::where('status', 'selesai')->get();
    	return $result;
    }


    public function pdf()
    {
    	$datas = $this->getData();
  //   	$pdf = App::make('dompdf.wrapper');
		// $pdf->loadHTML(view('main.laporan.pdf'));
    	$pdf = PDF::loadView('main.laporan.pdf', compact('datas'));
		return $pdf->stream();
    	return $pdf->download('invoice.pdf');
    }
}
