<div class="sidebar position-fixed p-3">
    <h4 class="text-white mb-4">Warehouse</h4>

    <ul class="nav flex-column gap-1">

        <li class="nav-item">
            <a href="/dashboard"
               class="nav-link px-3 py-2 rounded {{ request()->is('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>

        @if(auth()->user()->role === 'admin')
        <li class="nav-item">
            <a href="/products"
               class="nav-link px-3 py-2 rounded {{ request()->is('products*') ? 'active' : '' }}">
                Master Produk
            </a>
        </li>
        @endif

        <li class="nav-item">
            <a href="/barang-masuk"
               class="nav-link px-3 py-2 rounded {{ request()->is('barang-masuk*') ? 'active' : '' }}">
                Barang Masuk
            </a>
        </li>

        <li class="nav-item">
            <a href="/barang-keluar"
               class="nav-link px-3 py-2 rounded {{ request()->is('barang-keluar*') ? 'active' : '' }}">
                Barang Keluar
            </a>
        </li>

        <li class="nav-item">
            <a href="/laporan/stok"
               class="nav-link px-3 py-2 rounded {{ request()->is('laporan/stok') ? 'active' : '' }}">
                Laporan Stok
            </a>
        </li>

        <li class="nav-item">
            <a href="/laporan/transaksi"
               class="nav-link px-3 py-2 rounded {{ request()->is('laporan/transaksi*') ? 'active' : '' }}">
                Laporan Transaksi
            </a>
        </li>

    </ul>
</div>
