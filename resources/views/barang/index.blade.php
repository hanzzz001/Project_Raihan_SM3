@extends('layout.main')
@section('judul')
    Halaman Stok Barang
@endsection
@section('isi')
    @if (session()->has('success'))
        <div class="alert alert-primary">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Stok Barang</h5>
                    <div class="text-center">
                        <a href="{{ route('barang.create') }}" class="btn btn-primary center-block">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                    </div>
                    <table class="table table-secondary datatable">
                        <thead>
                            <tr>
                                <th class="border-top-0">Kategori</th>
                                <th class="border-top-0">Merk</th>
                                <th class="border-top-0">Nama Barang</th>
                                <th class="border-top-0">Tipe/Ukuran</th>
                                <th class="border-top-0">Foto</th>
                                <th class="border-top-0">Harga</th>
                                <th class="border-top-0">Stok</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $data)
                                <tr>
                                    <td>{{ $data->kategori }}</td>
                                    <td>{{ $data->merk }}</td>
                                    <td>{{ $data->namaB }}</td>
                                    <td>{{ $data->tipe_ukuran }}</td>
                                    <td><img src="{{ asset('storage/barang/' . $data->foto) }}" style="width:150px" class="img-thumbnail"></td>
                                    <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                                    <td>{{ $data->stok }} Unit</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('barang.destroy', $data->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-pill">
                                                <div class="icon">
                                                    <i class="bi bi-trash-fill"></i>
                                                </div>
                                            </button>
                                        </form>
                                        &nbsp;
                                        <a href="{{ route('barang.edit', $data->id) }}" class="btn btn-outline-warning">
                                            <div class="icon">
                                                <i class="bi bi-pencil-square"></i>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
