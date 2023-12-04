@extends('layouts.app')

@section('title', 'Buku')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Buku</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Buku</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Buku</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p>
            <div class="card">
                <div class="card-header">
                    <h4>Data Buku</h4>
                    <div class="card-header-action">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter"><i class="fas fa-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-buku">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $bk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td
                                            style="text-align: center; display: flex; flex-direction: column; align-items: center;">
                                            {!! DNS1D::getBarcodeHTML('$ ' . $bk->kode, 'C39+', 1, 25) !!}
                                            {{-- Parameter terakhir: panjang barcode --}}
                                            <div style="margin-top: 5px;">{{ $bk->kode }}</div>
                                        </td>
                                        <td>{{ $bk->judul }}</td>
                                        <td>{{ $bk->penerbit->nama }}</td>
                                        <td>{{ $bk->pengarang }}</td>
                                        <td><img src="{{ asset('/storage/buku/' . $bk->gambar) }}" alt="{{ $bk->gambar }}"
                                                style="width: 150px"></td>
                                        <td>
                                            <div text-align>
                                                <form action="/buku/delete/{{ $bk->id }}" id="btn-delete">
                                                    <a href="/buku/edit/{{ $bk->id }}"
                                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" data-id="{{ $bk->id }}"
                                                        onclick="confirmDelete(this)">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                    <a href="/buku/print/{{ $bk->id }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-print"></i>
                                                        Print</a>
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

    @include('buku.form')

    @push('script')
        <script>
            $(document).ready(function() {
                $('#table-buku').DataTable();
            });

            @if (session('sukses'))
                iziToast.success({
                    title: '{{ session('sukses') }}',
                    position: 'topRight'
                });
            @endif

            var data_kategori = $(this).attr('data-id')

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
                            form.action = '/buku/delete/' + id // Ubah aksi form sesuai dengan ID yang sesuai
                            form.submit();
                        }
                    });
            }
        </script>
    @endpush
@endsection
