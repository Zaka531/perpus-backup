@extends('layouts.app')

@section('title', 'Edit Data Kategori')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Data Kategori</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="/kategori">Kategori</a></div>
            <div class="breadcrumb-item">Edit Data Kategori</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Data Kategori</h2>
        <p class="section-lead">This page is just an example for you to create your own page.</p>
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Kategori</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="/kategori/edit/{{$kategori->id}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" placeholder="Masukkan Kode" name="kode" value="{{$kategori->kode}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="{{$kategori->nama}}">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
