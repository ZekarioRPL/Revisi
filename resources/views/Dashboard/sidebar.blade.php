<?php
          use App\Models\gaji;
          $cek_gaji = gaji::first();
          ?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light collapse mt-3">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Dashboard") ? 'active' : '' }}" aria-current="page" href="/">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>

          @can('bendahara')
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Bendahara</span>
        </h6>
        @if( !empty($cek_gaji) )
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Pembayaran") ? 'active' : '' }}" href="/pembayaran">
              <span data-feather="dollar-sign"></span>
              Pembayaran
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Pembayaran") ? 'active' : '' }}" href="/" onclick="alert('Maaf, Gaji Tidak Ada')">
              <span data-feather="dollar-sign"></span>
              Pembayaran
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Gaji") ? 'active' : '' }}" href="/gaji">
              <span data-feather="dollar-sign"></span>
              Gaji
            </a>
          </li>
          @endcan
          @can('karyawan')
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Profil") ? 'active' : '' }}" href="/profils">
              <span data-feather="users"></span>
              Profil
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ ($title === "Profile Perusahaan") ? 'active' : '' }}" aria-current="page" href="/profile_perusahaan">
              <span data-feather="info"></span>
              Profile Perusahaan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="clipboard"></span>
              Absensi
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="/oto">
                  <span data-feather="log-in"></span>
                  Absen Masuk
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/keluar">
                  <span data-feather="log-out"></span>
                  Absen Keluar
                </a>
              </li>
              <li><hr class="dropdown-divider "></li>
              <li>
                <a class="dropdown-item" href="/kehadiran">
                  <span data-feather="check-square"></span>
                  Kehadiran
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "List Karyawan") ? 'active' : '' }}" href="/karyawan">
              <span data-feather="users"></span>
              List Karyawan
            </a>
          </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link {{ ($title === "Gaji") ? 'active' : '' }}" href="/gaji">
              <span data-feather="dollar-sign"></span>
              Gaji
            </a>
          </li>
        @endcan

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Admin</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link  {{ ($title === "Profile Perusahaan") ? 'active' : '' }}" href="/profile_perusahaan">
              <span data-feather="globe"></span>
              Profile Perusahaan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Gaji") ? 'active' : '' }}" href="/gaji">
              <span data-feather="dollar-sign"></span>
              Gaji
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Absen") ? 'active' : '' }}" href="/absen">
              <span data-feather="users"></span>
              Absen
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Karyawan") ? 'active' : '' }}" href="/karyawan">
              <span data-feather="file-text"></span>
              Karyawan
            </a>
          </li>
        </ul>
        @endcan
      </div>
    </nav>