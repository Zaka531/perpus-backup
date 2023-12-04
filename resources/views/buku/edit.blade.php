@extends('layouts.app')

@section('title', 'Edit Data Buku')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Kategori</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/buku">Buku</a></div>
                <div class="breadcrumb-item">Edit Data Buku</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Data Buku</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Buku</h4>
                </div>
                <div class="card-body overflow-auto">
                    <div class="table">
                        <form action="/buku/edit/{{ $buku->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" id="kode" placeholder="Masukkan Kode"
                                        name="kode" value="{{ $buku->kode }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Judul"
                                        name="judul" value="{{ $buku->judul }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Kategori</label>
                                    <select class="custom-select" name="kategori_id">
                                        <option selected>Pilih...</option>
                                        @foreach ($kategori as $kate)
                                            <option value="{{ $kate->id }}"
                                                @if ($kate->id == $selectedKategoriId) selected @endif>
                                                {{ $kate->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="penerbit_id">Penerbit</label>
                                    <select class="custom-select" name="penerbit_id">
                                        <option selected>Pilih...</option>
                                        @foreach ($penerbit as $pene)
                                            <option value="{{ $pene->id }}"
                                                @if ($pene->id == $selectedPenerbitId) selected @endif>
                                                {{ $pene->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="isbn">ISBN</label>
                                    <input type="number" class="form-control" id="isbn" placeholder="Masukkan ISBN"
                                        name="isbn" value="{{ $buku->isbn }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pengarang">Pengarang</label>
                                    <input type="text" class="form-control" id="pengarang"
                                        placeholder="Masukkan Pengarang" name="pengarang" value="{{ $buku->pengarang }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="jumlah_halaman">Jumlah Halaman</label>
                                    <input type="number" class="form-control" id="jumlah_halaman"
                                        placeholder="Masukkan Jumlah Halaman" name="jumlah_halaman"
                                        value="{{ $buku->jumlah_halaman }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Stok</label>
                                    <input type="number" class="form-control" id="stok" name="stok"
                                        value="{{ $buku->stok }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="number" class="form-control" id="tahun_terbit"
                                        placeholder="Masukkan Nomor Telepon" name="tahun_terbit"
                                        value="{{ $buku->tahun_terbit }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Sinopsis</label>
                                <textarea class="form-control" name="sinopsis">{{ $buku->sinopsis }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control-file" name="gambar">
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
