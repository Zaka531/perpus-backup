@extends('layouts.app')

@section('title', 'Edit Data Anggota')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Kategori</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/anggota">Anggota</a></div>
                <div class="breadcrumb-item">Edit Data Anggota</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Data Anggota</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Anggota</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="/anggota/edit/{{ $anggota->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" id="kode" placeholder="Masukkan Kode"
                                        name="kode" value="{{ $anggota->kode }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama"
                                        name="nama" value="{{ $anggota->nama }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Jenis Kelamin</label>
                                    <select class="custom-select" name="jenis_kelamin">
                                        <option selected>Pilih...</option>
                                        <option value="Laki-Laki" @selected($anggota->jenis_kelamin == 'Laki-Laki')>Laki-Laki</option>
                                        <option value="Perempuan" @selected($anggota->jenis_kelamin == 'Perempuan')>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir"
                                        placeholder="Masukkan Tempat Lahir" name="tempat_lahir"
                                        value="{{ $anggota->tempat_lahir }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ $anggota->tanggal_lahir }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telpon">Telepon</label>
                                    <input type="number" class="form-control" id="telpon"
                                        placeholder="Masukkan Nomor Telepon" name="telpon" value="{{ $anggota->telpon }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat">{{ $anggota->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Foto</label>
                                <input type="file" class="form-control-file" name="foto">
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
