@extends('layout.main')
@section('judul')
Halaman Edit Stok Barang
@endsection
@section('isi')
<br>
<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Stok Barang</h3>
        </div>
        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" value="{{$barang->kategori }}" placeholder="Masukkan Jenis Barang">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" placeholder="Masukkan Merk Barang"
                            value="{{ $barang->merk}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" id="namaB" name="namaB"
                            placeholder="Masukkan Tipe Barang" value="{{ $barang->namaB}}">

                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Tipe/Ukuran</label>
                        <input type="text" class="form-control" id="tipe_ukuran" name="tipe_ukuran"
                            placeholder="Masukkan Tipe Barang" value="{{ $barang->tipe_ukuran}}">

                    </div>
                </div>
                <div class="row">
                    <div class="co col-md-12 form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="exampleInputFile">Pilih Foto</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok"
                            placeholder="Masukkan Stok Barang" value="{{ $barang->stok}}">

                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga"
                            placeholder="Masukkan Stok Barang" value="{{ $barang->harga}}">

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
    $(function () {
        $('#deskripsi_form').summernote()
    })
</script>
@endsection