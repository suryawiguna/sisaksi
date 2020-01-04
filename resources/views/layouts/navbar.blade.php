<nav class="navbar fixed-top d-flex flex-row align-items-stretch">
  <div id="real-navbar" class="d-flex w-100">
    <div class="d-flex align-content-stretch flex-wrap">
        <button id="btn-sidenav" type="button" class="btn btn-navbar align-self-center"><i class="mdi mdi-menu mdi-24px"></i></button>
    </div>
    <div class="d-flex align-content-stretch w-100">
        <img class="brand align-self-center mr-2" src="{{ URL::asset('storage/img/logo-white.png') }}" alt="logo" height="25">
        <h5 class="brand d-none d-md-block font-weight-bold m-0 align-self-center">Sistem Informasi Manajemen Saksi Pemilu</h5>
        <p class="brand d-sm-block d-md-none font-weight-bold m-0 align-self-center">Sistem Informasi <br/> Manajemen Saksi Pemilu</p>
    </div>
    @if(Auth::user()->is(1) || Auth::user()->is(2) || Auth::user()->is(4))
        <button id="btn-tambah" class="btn btn-navbar d-flex align-content-stretch" type="button" title="Tambah Data" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-plus-box-outline mdi-24px"></i>
        </button>
        <div id="dropdownAdd" class="dropdown-menu dropdown-menu-right border-0">
            @if(Auth::user()->is(2))
                <a class="dropdown-item d-flex align-content-stretch flex-wrap" href="{{route('saksi.create')}}">
                    <div class="align-self-center">
                        <i class="mdi mdi-account-multiple-plus mdi-24px"></i>
                    </div>
                    <div class="align-self-center link-name">
                        Saksi
                    </div>
                </a>
                <a class="dropdown-item d-flex align-content-stretch flex-wrap" href="{{route('koor.create')}}">
                    <div class="align-self-center">
                        <i class="mdi mdi-account-plus mdi-24px"></i>
                    </div>
                    <div class="align-self-center link-name">
                        Koordinator Saksi
                    </div>
                </a>
            @elseif(Auth::user()->is(1))
                <a class="dropdown-item d-flex align-content-stretch flex-wrap" href="{{route('pengumuman.create')}}">
                    <div class="align-self-center">
                        <i class="mdi mdi-bullhorn mdi-24px"></i>
                    </div>
                    <div class="align-self-center link-name">
                        Pengumuman
                    </div>
                </a>
                <a class="dropdown-item d-flex align-content-stretch flex-wrap" href="{{route('partai.create')}}">
                    <div class="align-self-center">
                        <i class="mdi mdi-flag mdi-24px"></i>
                    </div>
                    <div class="align-self-center link-name">
                        Partai
                    </div>
                </a>
            @elseif(Auth::user()->is(4))
                <a class="dropdown-item d-flex align-content-stretch flex-wrap" href="{{route('c1.create')}}">
                    <div class="align-self-center">
                        <i class="mdi mdi-file-image mdi-24px"></i>
                    </div>
                    <div class="align-self-center link-name">
                        Foto C1
                    </div>
                </a>
            @endif
        </div>
    @endif
  </div>
</nav>