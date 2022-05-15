<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/profils">
              <span data-feather="users"></span>
              Profil
            </a>
          </li>
          @can('karyawan')
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/profile_perusahaan">
              <span data-feather="activity"></span>
              Profile Perusahaan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="file"></span>
              Absensi
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="/absensi">
                  <span data-feather="file"></span>
                  Absen Masuk
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/keluar">
                  <span data-feather="file"></span>
                  Absen Keluar
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="/kehadiran">
                  <span data-feather="file"></span>
                  Kehadiran
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/karyawan">
              <span data-feather="layers"></span>
              List Karyawan
            </a>
          </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link" href="/gaji">
              <span data-feather="shopping-cart"></span>
              Gaji
            </a>
          </li>
        @endcan

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Admin</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="/profile_perusahaan">
              <span data-feather="file-text"></span>
              Profile Perusahaan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pembayaran">
              <span data-feather="file-text"></span>
              Pembayaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gaji">
              <span data-feather="shopping-cart"></span>
              Gaji
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/absen">
              <span data-feather="file-text"></span>
              Absen
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/karyawan">
              <span data-feather="file-text"></span>
              Karyawan
            </a>
          </li>
        </ul>
        @endcan
      </div>
    </nav>