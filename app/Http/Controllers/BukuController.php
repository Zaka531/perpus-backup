<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return $pdf->stream();
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

    public function edit($id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        $selectedKategoriId = $buku->kategori_id;
        $penerbit = Penerbit::all();
        $selectedPenerbitId = $buku->penerbit_id;

        return view('buku.edit', compact('buku', 'kategori', 'selectedKategoriId', 'penerbit', 'selectedPenerbitId'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/buku', $gambar->hashName());

            Storage::delete('public/buku/' . $buku->gambar);

            $buku->update([
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
        } else {
            $buku->update([
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
            ]);
        }

        $buku->update();

        return redirect('buku')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('buku')->with('sukses', 'Data Berhasil Dihapus');
    }
}
