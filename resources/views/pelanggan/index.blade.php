    @extends('layout.main')
    @section('judul')
        Halaman Info Pelanggan Kredit
    @endsection
    @section('isi')
        @if (session()->has('success'))
            <div class="alert alert-primary">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <br>
                <!-- Default Tabs -->

                <div class="tab-content pt-2" id="myTabjustifiedContent">
                    <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                        <a href="{{ route('pelanggan.create') }}"><button type="submit" class="btn btn-primary"><i
                                    class="fa fa-plus"></i>
                                Tambah</button></a>
                        <table class="table table-secondary datatable">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Nama Pembeli</th>
                                    <th class="border-top-0">Kategori Barang</th>
                                    <th class="border-top-0">Keterangan Barang</th>
                                    <th class="border-top-0">Total Kredit</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggan as $data)
                                    <tr>
                                        <td>{{ $data->namaC }}</td>
                                        <td>{{ $data->kategori }}</td>
                                        <td>
                                            {{ $data->namaB }} <br>
                                            {{ $data->merk }} <br>
                                            {{ $data->tipe_ukuran }} <br>
                                        </td>
                                        <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($data->lama >= 10)
                                                <span class="badge bg-success">Lunas</span>
                                            @else
                                                <div class="spinner-border text-warning" role="status">
                                                    <span class="visually-hidden"></span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalDialogScrollable_{{ $data->id }}">
                                                <div class="icon">
                                                    <i class="bi bi-arrows-fullscreen"></i>
                                                </div>
                                            </button>
                                            <div class="modal fade" id="modalDialogScrollable_{{ $data->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Data Pembeli</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <section class="section profile">
                                                                <div class="row">
                                                                    <div class="card">
                                                                        <div class="tab-pane fade show active profile-overview"
                                                                            id="profile-overview" >
                                                                            <h5 class="card-title">Profile Details
                                                                            </h5>
                                                                            <div class="row" style="width: 700px">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-3 col-md-4 label ">
                                                                                        Nama :</div>
                                                                                    <div class="col-lg-9 col-md-8">
                                                                                        {{ $data->namaC }}</div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-3 col-md-4 label">
                                                                                        Nomor HP</div>
                                                                                    <div class="col-lg-9 col-md-8">
                                                                                        {{ $data->noHp }}</div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-3 col-md-4 label">
                                                                                        Alamat</div>
                                                                                    <div class="col-lg-9 col-md-8">
                                                                                        {{ $data->alamat }}</div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-3 col-md-4 label">
                                                                                        Barang</div>
                                                                                    <div class="col-lg-9 col-md-8">
                                                                                        {{ $data->namaB }}</div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-3 col-md-4 label">
                                                                                        Bulanan</div>
                                                                                    <div class="col-lg-9 col-md-8">
                                                                                        Rp.
                                                                                        {{ number_format($data->nominal, 0, ',', '.') }}
                                                                                        /Bln</div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-3 col-md-4 label">
                                                                                        Angsuran Ke</div>
                                                                                    <div class="col-lg-9 col-md-8">
                                                                                        {{ $data->lama }}</div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-3 col-md-4 label">
                                                                                        Waktu Pembelian</div>
                                                                                    <div class="col-lg-9 col-md-8">
                                                                                        {{ $data->created_at }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-3 col-md-4 label">
                                                                                        FC
                                                                                        KTP :</div>
                                                                                    <div class="col-lg-9 col-md-8">
                                                                                        <img src="{{ asset('storage/pelanggan/' . $data->ktp) }}"
                                                                                            style="width:150px"
                                                                                            class="img-thumbnail">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-3 col-md-4 label">
                                                                                        FC
                                                                                        KK :</div>
                                                                                    <div class="col-lg-9 col-md-8">
                                                                                        <img src="{{ asset('storage/pelanggan/' . $data->kk) }}"
                                                                                            style="width:150px"
                                                                                            class="img-thumbnail">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </section>
                                                            <div class="tab-content pt-2" id="borderedTabContent">
                                                                <div class="tab-pane fade show active" id="bordered-home"
                                                                    role="tabpanel" aria-labelledby="home-tab">
                                                                    
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="bordered-profile"
                                                                    role="tabpanel" aria-labelledby="profile-tab">
                                                                    <section class="section profile">
                                                                        <div class="row">
                                                                            <div class="card">
                                                                                <div class="tab-pane fade show active profile-overview"
                                                                                    id="profile-overview">
                                                                                    <h5 class="card-title">Jaminan Pembeli
                                                                                    </h5>
                                                                                    <div class="row">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-lg-3 col-md-4 label">
                                                                                                FC
                                                                                                KTP :</div>
                                                                                            <div class="col-lg-9 col-md-8">
                                                                                                <img src="{{ asset('storage/pelanggan/' . $data->ktp) }}"
                                                                                                    style="width:150px"
                                                                                                    class="img-thumbnail">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-lg-3 col-md-4 label">
                                                                                                FC
                                                                                                KK :</div>
                                                                                            <div class="col-lg-9 col-md-8">
                                                                                                <img src="{{ asset('storage/pelanggan/' . $data->kk) }}"
                                                                                                    style="width:150px"
                                                                                                    class="img-thumbnail">
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </section>
                                                                </div>
                                                            </div><!-- End Bordered Tabs -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Update Data --}}
                                            @if ($data->lama < 10)
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#verticalycentered_{{ $data->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#verticalycentered_{{ $data->id }}" disabled>
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            @endif
                                            <div class="modal fade" id="verticalycentered_{{ $data->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Jumlah Angsuran</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('pelanggan.update', $data->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col col-md-12 form-group">
                                                                            <label>Angsuran</label>
                                                                            <input type="text" class="form-control"
                                                                                id="lama" name="lama"
                                                                                placeholder="Angsuran Ke">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <div class="card-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Update
                                                                            Angsuran</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End Vertically centered Modal-->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">

                    </div>

                </div><!-- End Default Tabs -->

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
                }).buttons().container().appendTo('#exampeq(0)');

                // Tambahkan script berikut untuk menangani pemilihan tab secara manual saat modal muncul
                $('#modalDialogScrollable_{{ $data->id }}').on('shown.bs.modal', function() {
                    // Pilih tab yang sesuai di dalam modal
                    $('ul.nav-tabs a[href="#bordered-home"]').tab('show');
                });
            });

            function showDataModal(id) {
                // Mengambil data pelanggan berdasarkan ID
                $.ajax({
                    url: '/getPelanggan/' + id, 
                    type: 'GET',
                    success: function(response) {
                        // Menampilkan modal
                        $('#modalDialogScrollable_' + id).modal('show');

                        // Menetapkan data jaminan ke tab "Jaminan"
                        $('#bordered-profile_' + id).html(response.jaminan);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        </script>
    @endsection
