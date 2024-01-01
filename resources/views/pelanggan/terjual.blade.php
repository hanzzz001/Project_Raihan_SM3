@extends('layout.main')
@section('judul')
    Halaman Barang Terjual Kredit
@endsection
@section('isi')
    @if (session()->has('success'))
        <div class="alert alert-primary">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Dark Table -->
                <table class="table table-secondary datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th class="border-top-0">Nama Barang</th>
                            <th class="border-top-0">Nama Pembeli</th>
                            <th class="border-top-0">Harga Barang</th>
                            <th class="border-top-0">Tanggal Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $startId = 1; 
                        @endphp
                        @foreach ($pelanggan as $data)
                            <tr>
                                <td>{{ $startId++ }}</td>
                                <td>{{ $data->namaB }}</td>
                                <td>{{ $data->namaC }}</td>
                                <td>{{ $data->nominal }} x 10 Bln</td>
                                <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
