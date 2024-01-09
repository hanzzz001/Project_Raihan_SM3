@extends('layout.main')
@section('judul')
    Halaman Tambah Pelanggan Cash
@endsection
@section('isi')
    <br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pelanggan Cash</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('cash.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Default select example" id="kategori" name="kategori" aria-placeholder="Pilih Kategori Barang">
                            <option value="Elektronik">Elektronik</option>
                            <option value="Meuble">Meuble</option>
                        </select>
                        <label for="floatingName">Kategori Barang</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="barang_id" class="form-control">
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->merk }} - {{ $barang->namaB }} - {{ $barang->tipe_ukuran }}</option>
                            @endforeach
                        </select>
                        <label for="floatingEmail">Nama Barang</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="unit" name="unit"
                            placeholder="Masukkan Harga Barang">
                        <label for="floatingSelect">Jumlah Pcs</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="harga" name="harga"
                            placeholder="Masukkan Harga Barang">
                        <label for="floatingSelect">Harga</label>
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
