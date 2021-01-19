<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

use Barryvdh\DomPDF\Facade as PDF;

class BukuController extends Controller
{
	public function index()
	{
		$buku = Buku::all();
		return view('home', compact('buku'));
	}

	public function store(Request $request)
    {
        $buku = new Buku();
        $buku->judul = $request->input('judul_buku');
        $buku->penerbit = $request->input('penerbit_buku');
        $buku->harga = $request->input('harga_buku');        
        $buku->save();
        return redirect('/')->with('status', 'Data berhasil ditambahkan ..');
	}
	
	public function update(Request $request)
    {
        $buku = Buku::find($request->input('id'));
        $buku->judul = $request->input('judul_buku_updt');
        $buku->penerbit = $request->input('penerbit_buku_updt');
        $buku->harga = $request->input('harga_buku_updt');        
        $buku->save();
        return redirect('/')->with('status', 'Data berhasil diubah ..');
	}
	
	public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
		return redirect('/')->with('status', 'Data berhasil dihapus ..');
	}

	public function createPDF()
	{
        $buku = Buku::all();
    
        $pdf = PDF::loadview('report.report', ['buku'=>$buku]);
        return $pdf->download('laporan_databuku.pdf');
    }

}
