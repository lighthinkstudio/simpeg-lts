    <aside class="main-sidebar sidebar-light-indigo elevation-4">
      <div class="text-center">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
          <img src="@if(!empty(konfigurasi('icon')->deskripsi) && file_exists(public_path('storage/assets/uploads/logo/' . konfigurasi('icon')->deskripsi))) {{ asset('storage/assets/uploads/logo/' . konfigurasi('icon')->deskripsi) }} @else {{ asset('assets/images/logo/' . konfigurasi('icon')->deskripsi) }} @endif" alt="Logo" class="brand-image img-rounded circle elevation-2 bg-light" style="opacity: .8">
          <span class="brand-text font-weight-light"><strong>{{ konfigurasi('singkatan')->deskripsi }} LTS</strong> {{ konfigurasi('versi')->deskripsi ?? 'v.1.0.0' }}</span>
        </a>
      </div>

      <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if(Auth::user()->foto)
            <img src="{{ Storage('/public/assets/images/profil/', Auth::user()->foto) }}" class="img-circle elevation-2" alt="User Image">
            @else
            <img src="{{ asset('assets/images/icons/user.png') }}" class="img-circle elevation-2" alt="User Image">
            @endif
          </div>
          <div class="info">
            <i class="fa-solid fa-dot-circle text-success"></i>
            <a href="#" class="d-inline"> {{ Auth::user()->nama ?? '' }}</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact text-sm" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-header"><i class="fa fa-layer-group"></i> <strong>NAVIGASI</strong></li>
            <li class="nav-item">
              <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="fa-solid fa-tachometer-alt nav-icon"></i>
                <p>
                  DASHBOARD
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin.pegawai') }}" class="nav-link">
                <i class="fa-solid fa-user-tie nav-icon"></i>
                <p>
                  DATA PEGAWAI
                </p>
              </a>
            </li>

            <li class="nav-header"><i class="fa fa-database"></i> <strong>DATA REFERENSI</strong></li>
            <li class="nav-item">
              <a href="{{ route('admin.import') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-sync"></i>
                <p>
                  SINKRON DATA
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-list"></i>
                <p>
                  DATA MASTER
                  <i class="right fa-solid fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>GOLONGAN</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>JABATAN</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>JENIS JABATAN</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>KEDUDUKAN HUKUM</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>UNIT ORGANISASI</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>JENIS UNIT ORGANISASI</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>INSTANSI KERJA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>SATUAN KERJA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>UNIT KERJA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>PENDIDIKAN</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>TINGKAT PENDIDIKAN</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>AGAMA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-circle"></i>
                    <p>JENIS KAWIN</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin.akun_pegawai') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-user-shield"></i>
                <p>
                  AKUN PEGAWAI
                </p>
              </a>
            </li>


            <li class="nav-header"><i class="fa fa-gear"></i> <strong>PENGATURAN</strong></li>

            <li class="nav-item">
              <a href="{{ route('admin.konfigurasi') }}" class="nav-link">
                <i class="fa-solid fa-earth-asia nav-icon"></i>
                <p>
                  DATA WEBSITE
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin.import') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-exchange-alt"></i>
                <p>
                  BACKUP &amp; RESTORE
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin.user') }}" class="nav-link">
                <i class="fa-solid fa-user-lock nav-icon"></i>
                <p>
                  PENGGUNA
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault(); document.getElementById('logout').submit();" class="btn btn-danger">
                <i class="nav-icon fa-solid fa-power-off text-danger"></i>
                <p>LOGOUT</p>
              </a>
              <form action="{{ route('logout') }}" id="logout" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </nav>

      </div>

    </aside>