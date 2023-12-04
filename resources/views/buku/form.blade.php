<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" placeholder="Masukkan Kode"
                                name="kode">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama">Judul</label>
                            <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul"
                                name="judul">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kategori</label>
                            <select class="custom-select" name="kategori_id">
                                <option selected>Pilih...</option>
                                @foreach ($kategori as $kate)
                                    <option value="{{ $kate->id }}">{{ $kate->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Penerbit</label>
                            <select class="custom-select" name="penerbit_id">
                                <option selected>Pilih...</option>
                                @foreach ($penerbit as $pene)
                                    <option value="{{ $pene->id }}">{{ $pene->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="isbn">ISBN</label>
                            <input type="number" class="form-control" id="isbn" placeholder="Masukkan Nomor ISBN"
                                name="isbn">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang"
                                placeholder="Masukkan Nama Pengarang" name="pengarang">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jumlah_halaman">Jumlah Halaman</label>
                            <input type="number" class="form-control" id="jumlah_halaman"
                                placeholder="Masukkan Jumlah Halaman" name="jumlah_halaman">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" placeholder="Masukkan Stok"
                                name="stok">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="number" class="form-control" id="tahun_terbit"
                                placeholder="Masukkan Tahun Terbit" name="tahun_terbit">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sinopsis">Sinopsis</label>
                            <input type="text" class="form-control" id="sinopsis"
                                placeholder="Masukkan Nama Sinopsis" name="sinopsis">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Gambar</label>
                        <input type="file" class="form-control-file" name="gambar">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
