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
            <a class="nav-link {{ request()->routeIs('desa_wisata.*') ? 'active' : '' }}" href="{{ route('desa_wisata.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Desa Wisata</span>
            </a>
        </li>

        </li>
            <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('kriteria.*') ? 'active' : '' }}" href="/kriteria">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Kriteria</span>
            </a>
        </li>

          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Perhitungan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Blog</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
