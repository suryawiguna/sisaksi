<div id="side-nav" class="col p-0">
  <ul class="nav mb-2">
    <li id="account-container" class="nav-item d-flex flex-row">
        @if(Auth::user()->is(1) || Auth::user()->is(2))
        <i class="mdi mdi-account-circle mdi-24px align-self-center"></i>
        @elseif(Auth::user()->is(3))
        <div class="avatar-container">
            <img src="{{ asset('storage/koor/foto_diri/'.Auth::user()->koor->foto_diri) }}" class="avatar" alt="foto profil">
        </div>
        @elseif(Auth::user()->is(4))
        <div class="avatar-container">
            <img src="{{ asset('storage/saksi/foto_diri/'.Auth::user()->saksi->foto_diri) }}" class="avatar" alt="foto profil">
        </div>
        @endif
        <div id="account-info" class="align-self-center flex-grow-1">
            @if(Auth::user()->is(1))
                <p class="mx-0 mb-1 font-weight-bold">{{Auth::user()->role->name}}</p>
                <small class="text-muted role1">{{Auth::user()->role->name}}</small>
            @elseif(Auth::user()->is(2))
                <p class="mx-0 mb-1 font-weight-bold" title="{{Auth::user()->komisisaksi->nama}}">
                    {{str_limit(Auth::user()->komisisaksi->nama, 15)}}
                </p>
                <small class="text-muted role2">{{Auth::user()->role->name}}</small>
            @elseif(Auth::user()->is(3))
                <p class="mx-0 mb-1 font-weight-bold">{{\Illuminate\Support\Str::words(Auth::user()->koor->nama, 2,'')}}</p>
                <small class="text-muted role3">{{Auth::user()->role->name}}</small>
            @elseif(Auth::user()->is(4))
                <p class="mx-0 mb-1 font-weight-bold">{{\Illuminate\Support\Str::words(Auth::user()->saksi->nama, 2,'')}}</p>
                <small class="text-muted role4">{{Auth::user()->role->name}}</small>
            @endif
        </div>
    </li>
    <hr class="mb-2 mt-0">
    @if(Auth::user()->is(1) || Auth::user()->is(2))
    <li class="nav-item {{ request()->is('target*') ? 'active-nav' : '' }}">
      <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{ route('target.index') }}" title="Lihat Kemajuan Target">
        <div class="align-self-center">
          <i class="mdi mdi-finance mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Target
        </div>
      </a>
    </li>
    <li class="nav-item {{ request()->is('saksi*') ? 'active-nav' : '' }}">
        <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('saksi.index')}}" title="Semua Saksi">
        <div class="align-self-center">
          <i class="mdi mdi-account-group mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Saksi
        </div>
      </a>
    </li>
    <li class="nav-item {{ request()->is('koor*') ? 'active-nav' : '' }}">
      <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{ route('koor.index') }}" title="Semua Koordinator Saksi">
        <div class="align-self-center">
          <i class="mdi mdi-account-multiple mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Koordinator Saksi
        </div>
      </a>
    </li>
    @endif
    
    @if(Auth::user()->role_id !== 1)
    <li class="nav-item {{ request()->is('pengumuman*') ? 'active-nav' : '' }}">
      <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('pengumuman.index')}}" title="Pengumuman">
        <div class="align-self-center">
          <i class="mdi mdi-bullhorn mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Pengumuman
        </div>
      </a>
    </li>
    @endif

    @if(Auth::user()->is(4))
    <li class="nav-item {{ request()->is('c1*') ? 'active-nav' : '' }}">
        <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('c1saya')}}" title="Pengumuman">
          <div class="align-self-center">
            <i class="mdi mdi-file-image mdi-24px"></i>
          </div>
          <div class="align-self-center link-name">
            Foto C1 Saya
          </div>
        </a>
    </li>
    @endif

    @if(Auth::user()->is(2))
    <li class="nav-item {{ request()->is('mysaksi') ? 'active-nav' : '' }}">
      <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('mysaksi')}}" title="Daftar Saksi Saya">
        <div class="align-self-center">
          <i class="mdi mdi-account-supervisor mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Saksi Saya
        </div>
      </a>
    </li>
    <li class="nav-item {{ request()->is('mykoor') ? 'active-nav' : '' }}">
        <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('mykoor')}}" title="Daftar Koordinator Saksi Saya">
        <div class="align-self-center">
          <i class="mdi mdi-account-supervisor-circle mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Koordinator Saya
        </div>
      </a>
    </li>
    @endif

    @if(Auth::user()->is(1))
    <li class="nav-item {{ request()->is('pengumuman*') ? 'active-nav' : '' }}">
        <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('pengumumanku')}}" title="Pengumuman">
            <div class="align-self-center">
            <i class="mdi mdi-bullhorn mdi-24px"></i>
            </div>
            <div class="align-self-center link-name">
            Pengumumanku
            </div>
        </a>
    </li>
    <li class="nav-item {{ request()->is('c1*') ? 'active-nav' : '' }}">
        <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('c1.index')}}" title="Pengumuman">
            <div class="align-self-center">
            <i class="mdi mdi-file-image mdi-24px"></i>
            </div>
            <div class="align-self-center link-name">
            Foto C1
            </div>
        </a>
    </li>
    <li class="nav-item {{ request()->is('user*') ? 'active-nav' : '' }}">
      <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('user.index')}}" title="Daftar Pengguna">
        <div class="align-self-center">
          <i class="mdi mdi-account-box-multiple mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Pengguna
        </div>
      </a>
    </li>
    <li class="nav-item {{ request()->is('partai*') ? 'active-nav' : '' }}">
      <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('partai.index')}}" title="Daftar Partai">
        <div class="align-self-center">
          <i class="mdi mdi-flag mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Partai
        </div>
      </a>
    </li>
    @endif
    
    <li class="nav-item {{ request()->is('akunsaya*') ? 'active-nav' : '' }}">
      <a class="nav-link d-flex align-content-stretch flex-wrap" href="{{route('akunsaya')}}" title="Akun Saya">
        <div class="align-self-center">
          <i class="mdi mdi-account-details mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Akun Saya
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a id="logout" class="nav-link d-flex align-content-stretch flex-wrap" 
      href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();" title="Logout">
        <div class="align-self-center">
          <i class="mdi mdi-logout-variant mdi-24px"></i>
        </div>
        <div class="align-self-center link-name">
          Logout
        </div>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  </ul>
</div>