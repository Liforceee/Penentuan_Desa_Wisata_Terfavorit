     <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('adminhome.*') ? 'active' : '' }}" href="adminhome">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('desa_wisata.*') ? 'active' : '' }}"
                href="{{ route('desa_wisata.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Desa Wisata</span>
            </a>
        </li>

        </li>
            <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('kriteria.*') ? 'active' : '' }}"
                href="{{ route('kriteria.index') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Kriteria</span>
            </a>
        </li>

          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('perhitungan.*') ? 'active' : '' }}"
                href="{{ route('perhitungan') }}">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Perhitungan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('users*') ? '' : 'collapsed' }}"
            href="{{ route('users.index') }}">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
