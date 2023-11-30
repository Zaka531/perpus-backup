<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.index', compact('buku', 'kategori', 'penerbit'));
    }

    public function print($id)
    {
        $buku = Buku::find($id);

        $pdf = Pdf::loadView('buku.print', compact('buku'));
        $pdf->setPaper('A4');
	    return $pdf->stream('file.pdf');
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/buku', $gambar->hashName());

        Buku::create([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'jumlah_halaman' => $request->jumlah_halaman,
            'stok' => $request->stok,
            'tahun_terbit' => $request->tahun_terbit,
            'sinopsis' => $request->sinopsis,
            'gambar' => $gambar->hashName(),
        ]);

        return redirect('buku')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function edit(Buku $buku)
    {
        //
    }

    public function update(Request $request, Buku $buku)
    {
        //
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('buku')->with('sukses', 'Data Berhasil Dihapus');
    }
}
