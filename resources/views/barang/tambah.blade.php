@extends('layout.main')
@section('judul')
    Halaman Barang Masuk
@endsection
@section('isi')
    <br>
    <div class="col">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Barang Baru Masuk</h3>
            </div>
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label class="col-sm-2 col-form-label">Kategori Barang</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="kategori" name="kategori" aria-placeholder="Pilih Jenis Barang">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Meuble">Meuble</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label for="inputText" class="col-sm-2 col-form-label">Merk </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="merk" name="merk"
                                    placeholder="Masukkan Merk Barang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="co col-md-12 form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <div class="col-sm-10">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Upload Foto Barang</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="foto" name="foto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Barang </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaB" name="namaB"
                                    placeholder="Masukkan Nama Barang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label for="inputText" class="col-sm-2 col-form-label">Tipe/Ukuran Barang </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tipe_ukuran" name="tipe_ukuran"
                                    placeholder="Masukkan Tipe/Ukuran Barang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stok" name="stok"
                                    placeholder="Masukkan Jumlah Stok">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label for="inputText" class="col-sm-2 col-form-label">Harga Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="harga" name="harga"
                                    placeholder="Masukkan Harga Barang">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Tautan ke jQuery Mask Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

@section('js')
    <script>
        $(document).ready(function() {
            // Format input harga saat dokumen di-load
            $('#harga').mask('000.000.000', { reverse: true });

            // Format input harga saat nilai diubah
            $('#harga').on('input', function() {
                var formatted = $(this).val().replace(/\./g, '');
                $(this).val(formatted);
            });
        });
    </script>
@endsection