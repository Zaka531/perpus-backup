<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function store(Request $request)
    {
        $image = $request->file('foto');
        $image->storeAs('public/anggota', $image->hashName());

        Anggota::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
            'foto' => $image->hashName(),
        ]);

        return redirect('anggota')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $anggota = Anggota::find($id);

        if ($request->hasFile('foto')) {

            $image = $request->file('foto');
            $image->storeAs('public/anggota', $image->hashName());

            Storage::delete('public/anggota/'.$anggota->foto);

            $anggota->update([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telpon' => $request->telpon,
                'alamat' => $request->alamat,
                'foto' => $image->hashName(),
            ]);

        } else {
            $anggota->update([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telpon' => $request->telpon,
                'alamat' => $request->alamat,
            ]);
        }

        $anggota->update();

        return redirect('anggota')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect('anggota')->with('sukses', 'Data Berhasil Dihapus');
    }
}
