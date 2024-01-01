@extends('layout.main')
@section('judul')
    Halaman Barang Terjual Cash
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
                    <h5 class="card-title"></h5>
                    <table class="table table-secondary datatable">
                        <thead>
                            <tr >
                                <th class="border-top-0">Merk</th>
                                <th class="border-top-0">Nama Barang</th>
                                <th class="border-top-0">Pcs</th>
                                <th class="border-top-0">Harga</th>
                                <th class="border-top-0">Total Pembelian</th>
                                <th class="border-top-0">Tanggal Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cash as $data)
                                <tr>
                                    <td>{{ $data->merk }}</td>
                                    <td>{{ $data->namaB }}</td>
                                    <td>{{ $data->unit }}</td>
                                    <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                    <td>{{ $data->created_at->format('d-m-Y') }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                    <a href="{{ route('cash.create') }}"><button type="submit" class="btn btn-primary" ><i
                        class="fa fa-plus"></i>
                    Tambah</button></a>
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
