@extends('layout.main')
@section('judul')
    Halaman Tambah Pelanggan
@endsection
@section('isi')
    <br>
    <div class="card">
        <div class="card-body">
            <br>
            <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" id="namaC" name="namaC"
                                placeholder="Masukkan Nama Pembeli">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>No Handphone</label>
                            <input type="text" class="form-control" id="noHp" name="noHp"
                                placeholder="Masukkan No HP">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukkan Alamat Pembeli">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label class="col-sm-2 col-form-label">Kategori Barang</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="kategori" name="kategori" aria-placeholder="Pilih Kategori Barang">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Meuble">Meuble</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Merk Barang</label>
                            <input type="text" class="form-control" id="merk" name="merk"
                                placeholder="Masukkan Merk Barang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" id="namaB" name="namaB"
                                placeholder="Masukkan Merk Barang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Tipe/Ukuran</label>
                            <input type="text" class="form-control" id="tipe_ukuran" name="tipe_ukuran"
                                placeholder="Masukkan Tipe/Ukuran Barang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Nominal Kredit</label>
                            <input type="text" class="form-control" id="nominal" name="nominal"
                                placeholder="Masukkan Nominal Angsuran Perbulannya">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Angsuran</label>
                            <input type="text" class="form-control" id="lama" name="lama"
                                placeholder="Angsuran Ke">
                        </div>
                    </div>
                    <div class="row">
                        <div class="co col-md-12 form-group">
                            <label for="exampleInputFile">Foto Copy KTP</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ktp" name="ktp">
                                    <label class="custom-file-label" for="exampleInputFile">Pilih Foto KTP</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="co col-md-12 form-group">
                            <label for="exampleInputFile">Foto Copy KK</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="kk" name="kk">
                                    <label class="custom-file-label" for="exampleInputFile">Pilih Foto KK</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('js')
    <script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $('#deskripsi_form').summernote()
        })
    </script>
@endsection
