@extends('layouts.app')

@section('title', 'Anggota')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Anggota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Anggota</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Anggota</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p>
            <div class="card">
                <div class="card-header">
                    <h4>Data Anggota</h4>
                    <div class="card-header-action">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter"><i class="fas fa-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-anggota">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Foto</th>
                                    <th style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $angg)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $angg->kode }}</td>
                                        <td>{{ $angg->nama }}</td>
                                        <td>{{ $angg->jenis_kelamin }}</td>
                                        <td><img src="{{ asset('/storage/anggota/' . $angg->foto) }}"
                                                alt="{{ $angg->foto }}" style="width: 150px"></td>
                                        <td>
                                            <div text-align>
                                                <form action="/anggota/delete/{{ $angg->id }}" id="btn-delete"
                                                    method="get">
                                                    <a href="/anggota/edit/{{ $angg->id }}"
                                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" data-id="{{ $angg->id }}"
                                                        onclick="confirmDelete(this)">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('anggota.form')

    @push('script')
        <script>
            $(document).ready(function() {
                $('#table-anggota').DataTable();
            });

            @if (session('sukses'))
                iziToast.success({
                    title: '{{ session('sukses') }}',
                    position: 'topRight'
                });
            @endif

            var data_anggota = $(this).attr('data-id')

            function confirmDelete(button) {

                event.preventDefault()
                const id = button.getAttribute('data-id');
                swal({
                        title: 'Apa Anda Yakin ?',
                        text: 'Anda akan menghapus ID: ' + id +
                            '. Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // const form = document.getElementById('delete-form')
                            const form = button.form;
                            // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
                            form.action = '/anggota/delete/' + id // Ubah aksi form sesuai dengan ID yang sesuai
                            form.submit();
                        }
                    });
            }
        </script>
    @endpush
@endsection
