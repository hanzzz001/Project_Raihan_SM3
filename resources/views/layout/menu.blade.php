<li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('home') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li><!-- End Dashboard Nav -->

<li class="nav-heading">Menu</li>

<!-- End Contact Page Nav -->

@if ($user->level == 1)
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('barang') }}">
            <i class="bi bi-basket-fill"></i>
            <span>Stok Barang</span>
        </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-heading">Detail Kredit</li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('pelanggan') }}">
            <i class="ri-account-circle-fill"></i>
            <span>Pelanggan Kredit</span>
        </a>
    </li>

    <li class="nav-heading">Penjualan</li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('terjual') }}">
            <i class="bx bxs-purchase-tag-alt"></i>
            <span>Kredit</span>
        </a>
    </li><!-- End F.A.Q Page Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('cash') }}">
            <i class="bx bxs-purchase-tag"></i>
            <span>Cash</span>
        </a>
    </li>
@elseif ($user->level == 2)
    <li class="nav-heading">Detail Kredit</li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('pelanggan') }}">
            <i class="ri-account-circle-fill"></i>
            <span>Info Pelanggan</span>
        </a>
    </li>
@endif
