@extends('layout.main')

@section('js')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection

@section('judul')
    Halaman Home
@endsection

@section('isi')
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Pemasukan <span>| Cash</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Rp. {{ $penjualanCashBulan }}</h6>
                                    <span class="text-primary small pt-1 fw-bold">{{ $bulan }}</span> <span
                                        class="text-muted small pt-2 ps-1">{{ $tahun }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title">Pemasukan <span>| Kredit</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Rp. {{ $penjualanAkhir }}</h6>
                                    <span class="text-success small pt-1 fw-bold">{{ $bulan }}</span> <span
                                        class="text-muted small pt-2 ps-1">{{ $tahun }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Jumlah <span>| Barang Terjual</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalSemua }} </h6>
                                    <span class="text-danger small pt-1 fw-bold">{{ $bulan }}</span> <span
                                        class="text-muted small pt-2 ps-1">{{ $tahun }}</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

            </div>

        </div><!-- End Left side columns -->
        <!-- Reports -->
        <div class="col-12">
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Reports <span>/Pemasukan Bulanan Cash & Kredit</span></h5>

                    <!-- Line Chart -->
                    <div id="reportsChart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#reportsChart"), {
                                series: [{
                                    name: 'Penjualan Kredit',
                                    data: @json($dataTotalCash),
                                }, {
                                    name: 'Penjualan Cash',
                                    data: @json($dataTotalPemasukan),
                                }],
                                chart: {
                                    height: 350,
                                    type: 'area',
                                    toolbar: {
                                        show: false
                                    },
                                },
                                markers: {
                                    size: 4
                                },
                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.4,
                                        stops: [0, 90, 100]
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    curve: 'smooth',
                                    width: 2
                                },
                                xaxis: {
                                    // type: 'datetime',
                                    // categories: @json($dataBulan),
                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Okt','Nov','Des'],
                                },
                                yaxis: {
                                    labels: {
                                        formatter: function(value) {
                                            return "Rp." + value.toLocaleString("id-ID", {
                                                style: "currency",
                                                currency: "IDR"
                                            });
                                        }
                                    },
                                },
                                tooltip: {
                                    x: {
                                        format: 'MM/yy'
                                    },
                                }
                            }).render();
                        });
                    </script>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div>

        <!-- Recent Sales -->
        <!-- End Recent Sales -->
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Jumlah Barang Terjual </h5>

                <!-- Column Chart -->
                <div id="columnChart"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#columnChart"), {
                            series: [{
                                name: 'Barang Kredit',
                                data: @json($dataBarangKredit),
                            }, {
                                name: 'Barang Cash',
                                data: @json($dataBarangCash),
                            }],
                            chart: {
                                type: 'bar',
                                height: 350
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded'
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent']
                            },
                            xaxis: {
                                categories: @json($dataBulan),
                            },
                            yaxis: {
                                title: {
                                    text: '$ (thousands)'
                                }
                            },
                            fill: {
                                opacity: 1
                            },
                            tooltip: {
                                x: {
                                    format: 'MM/yy'
                                },
                            }
                        }).render();
                    });
                </script>
                <!-- End Column Chart -->

            </div>
        </div>
    </div>
@endsection
