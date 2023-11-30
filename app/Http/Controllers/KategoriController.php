<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
        ]);
        // dd($request->all());

        Kategori::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect('kategori')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->kode = $request->kode;
        $kategori->nama = $request->nama;
        $kategori->update();

        return redirect('kategori')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('kategori')->with('sukses', 'Data Berhasil Dihapus');
    }
}
