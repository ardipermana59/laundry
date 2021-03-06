<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user  -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block info-name">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if( Auth::user()->role == 'admin')
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-wave-alt"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('transaksi.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>Daftar Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('transaksi.create') }}" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Tambah Data Transaksi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Paket Cucian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('paket.index') }}" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Daftar Paket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paket.create') }}" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Tambah Paket</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Outlet
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('outlet.index') }}" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Daftar Outlet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('outlet.create') }}" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Tambah Outlet</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Member
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('member.index') }}" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Daftar Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('member.create') }}" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Tambah Member</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif ( Auth::user()->role == 'kasir')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('transaksi.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>Daftar Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('transaksi.create') }}" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Tambah Data Transaksi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Member
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('member.index') }}" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Daftar Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('member.create') }}" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Tambah Member</p>
                </a>
              </li>
            </ul>
          </li>
          @else
          
          @endif
          </li>
            <li class="nav-item">
            <a href="{{ route('laporan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('setting') }}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>