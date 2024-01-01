@extends('layout.main')
@section('judul')
    Halaman Tambah Pelanggan
@endsection
@section('isi')
    <br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Floating labels Form</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="namaC" name="namaC"
                            placeholder="Masukkan Nama Pembeli">
                        <label for="floatingName">Nama Pembeli</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="noHp" name="noHp"
                            placeholder="Masukkan Merk Barang">
                        <label for="floatingEmail">No HP</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="merk" name="merk"
                            placeholder="Masukkan Merk Barang">
                        <label for="floatingEmail">Merk Barang</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="namaB" name="namaB"
                            placeholder="Masukkan Nama Barang">
                        <label for="floatingPassword">Nama Barang</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Default select example" id="kategori" name="kategori"
                            aria-placeholder="Pilih Jenis Barang">
                            <option value="Elektronik">Elektronik</option>
                            <option value="Meuble">Meuble</option>
                        </select>
                        <label for="floatingName">Kategori Barang</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                      <textarea class="form-control" class="form-control" id="tipe_ukuran" name="tipe_ukuran" style="height: 100px;"></textarea>
                      <label for="floatingTextarea">Tipe/Ukuran Barang</label>
                    </div>
                  </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea class="form-control" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Pembeli"
                            style="height: 100px;"></textarea>
                        <label for="floatingTextarea">Alamat Pembeli</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nominal" name="nominal"
                                placeholder="Masukkan Jumlah Stok">
                            <label for="floatingCity">Nominal Angsuran</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="lama" name="lama"
                            placeholder="Masukkan Harga Barang">
                        <label for="floatingSelect">Angsuran</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="unit" name="unit"
                            placeholder="Masukkan Harga Barang">
                        <label for="floatingSelect">Jumlah Pcs</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <input class="form-control" type="file" id="ktp" name="ktp">
                        <label for="floatingZip">FC KTP</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <input class="form-control" type="file" id="kk" name="kk">
                        <label for="floatingZip">FC KK</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End floating Labels Form -->

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
