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
            <form action="{{ route('cash.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk"
                                placeholder="Masukkan Merk Barang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" id="namaB" name="namaB"
                                placeholder="Masukkan Nama Barang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" id="namaC" name="namaC"
                                placeholder="Masukkan Nama Pembeli">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12 form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                                placeholder="Masukkan Harga Barang">
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