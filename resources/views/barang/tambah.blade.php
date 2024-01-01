@extends('layout.main')
@section('judul')
    Halaman Barang Masuk
@endsection
@section('isi')
    <br>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Floating labels Form</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
              <div class="form-floating">
                <select class="form-select" aria-label="Default select example" id="kategori"
                                    name="kategori" aria-placeholder="Pilih Jenis Barang">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Meuble">Meuble</option>
                                </select>
                <label for="floatingName">Kategori Barang</label>
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
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control" class="form-control" id="tipe_ukuran" name="tipe_ukuran" style="height: 100px;"></textarea>
                <label for="floatingTextarea">Tipe/Ukuran Barang</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="form-floating">
                    <input type="number" class="form-control" id="stok" name="stok"
                    placeholder="Masukkan Jumlah Stok">
                  <label for="floatingCity">Jumlah Stok</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="harga" name="harga"
                                    placeholder="Masukkan Harga Barang">
                <label for="floatingSelect">Harga Barang</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-floating">
                <input class="form-control" type="file" id="foto" name="foto">
                <label for="floatingZip">Foto</label>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Tautan ke jQuery Mask Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

@section('js')
    <script>
        $(document).ready(function() {
            // Format input harga saat dokumen di-load
            $('#harga').mask('000.000.000', {
                reverse: true
            });

            // Format input harga saat nilai diubah
            $('#harga').on('input', function() {
                var formatted = $(this).val().replace(/\./g, '');
                $(this).val(formatted);
            });
        });
    </script>
@endsection
