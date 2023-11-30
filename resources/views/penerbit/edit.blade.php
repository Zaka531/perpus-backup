@extends('layouts.app')

@section('title', 'Edit Data Penerbit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Data Penerbit</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="/penerbit">Penerbit</a></div>
            <div class="breadcrumb-item">Edit Data Penerbit</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Data Penerbit</h2>
        <p class="section-lead">This page is just an example for you to create your own page.</p>
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Penerbit</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="/penerbit/edit/{{$penerbit->id}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" placeholder="Masukkan Kode" name="kode" value="{{$penerbit->kode}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="{{$penerbit->nama}}">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
