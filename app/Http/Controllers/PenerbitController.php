<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
        ]);

        Penerbit::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect('penerbit')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $penerbit = Penerbit::find($id);
        return view('penerbit.edit', compact('penerbit'));
    }

    public function update(Request $request, $id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->kode = $request->kode;
        $penerbit->nama = $request->nama;
        $penerbit->update();

        return redirect('penerbit')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->delete();

        return redirect('penerbit')->with('sukses', 'Data Berhasil Dihapus');
    }
}
