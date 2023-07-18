    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      @php
      use App\Models\User;
      $pengguna = new User;
      $pengguna = $pengguna->where('id', Auth::user()->id)->first();
      @endphp
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('home') }}" class="nav-link" target="_blank">
            <i class="fas fa-house-chimney"></i> Beranda
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            @if($pengguna->foto)
            <img src="{{ Storage('/public/assets/images/profil/', $pengguna->foto) }}" class="user-image img-circle elevation-2" alt="User Image">
            @else
            <img src="{{ asset('assets/images/icons/user.png') }}" class="user-image img-circle elevation-2" alt="User Image">
            @endif
            <span class="d-none d-md-inline">{{ $pengguna->nama ?? '' }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <li class="user-header">
              @if($pengguna->foto)
              <img src="{{ Storage('/public/assets/images/profil/', $pengguna->foto) }}" class="img-circle elevation-2" alt="User Image">
              @else
              <img src="{{ asset('assets/images/icons/user.png') }}" class="img-circle elevation-2" alt="User Image">
              @endif
              <p>
                <strong>{{ $pengguna->nama ?? '' }}</strong><br>
                <span class="badge bg-light">
                  <i class="fa fa-clipboard-user"></i>
                  {{ $pengguna->nip ?? '' }}
                </span>
              </p>
            </li>
            <li class="user-footer bg-white">
              <div class="row">
                <div class="col-12">
                  <a href="#" class="btn btn-block btn-default rounded-pill">
                    <i class="fa fa-user"></i> Profil
                  </a>
                  <a href="#" class="btn btn-block btn-default rounded-pill">
                    <i class="fa fa-user-pen"></i> Edit Profil
                  </a>
                </div>
              </div>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault(); document.getElementById('logout').submit();" class="btn btn-danger">
            <i class="fas fa-lg fa-power-off text-danger"></i>
          </a>
          <form action="{{ route('logout') }}" id="logout" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </nav>