<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#">Monitoring &nbsp;<span class="highlight">LPG</span></a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="@yield('activeDashboard')">
        <a href="{{ route('dashboard') }}">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>


      @if (Auth::user()->role == 'Admin')
      <li class="@yield('activeBarang')">
        <a href="{{ route('barang.index') }}">
          <div class="icon">
            <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
          </div>
          <div class="title">Barang Masuk</div>
        </a>
      </li>
      @endif

      @if (Auth::user()->role == 'Admin')
      <li class="dropdown @yield('activeMaster')">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-database" aria-hidden="true"></i>
          </div>
          <div class="title">Master Data</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="{{ route('pangkalan.index') }}" class="@yield('pangkalan')">Pangkalan</a></li>
            <li><a href="{{ route('user.index') }}" class="@yield('user')">User</a></li>
          </ul>
        </div>
      </li>
      @endif

      <li class="dropdown @yield('activeDistribusi')">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-cubes" aria-hidden="true"></i>
          </div>
          <div class="title">Distribusi</div>
        </a>
        <div class="dropdown-menu">
          <ul>

            @if (Auth::user()->role == 'Admin')
            <li><a href="{{ route('distribusi.index')}}" class="@yield('draftPengiriman')">Draft Pengiriman</a></li>
            @endif

            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manajer')
            <li><a href="{{ route('manajer.index')}}" class="@yield('pengajuan')">Pengajuan diajukan</a></li>
            <li><a href="{{ route('laporan.index')}}" class="@yield('laporan')">Laporan</a></li>
            @endif

            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Sopir')
            <li><a href="{{ route('sopir.index')}}" class="@yield('jadwal')">Jadwal Pengiriman</a></li>
            @endif

          </ul>
        </div>
      </li>
    </ul>
  </div>
  <div class="sidebar-footer">
    <ul class="menu">
      <li>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-cogs" aria-hidden="true"></i>
        </a>
      </li>
      <li><a href="#"><span class="flag-icon flag-icon-id flag-icon-squared"></span></a></li>
    </ul>
  </div>
</aside>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
  </div>
</script>