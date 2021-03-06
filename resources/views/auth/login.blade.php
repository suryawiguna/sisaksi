<!DOCTYPE html>
<html>
  <head>
    <title>Login - Sistem Informasi Manajemen Saksi Pemilu</title>
    @include('layouts.base')
  </head>

  <body>
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div id="red"></div>
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div id="overlay-login"></div>

            <div class="card card-radius border-0 p-3">
                <div class="card-header border-0">
                    <img src="{{ asset('storage/img/logo.png') }}" alt="logo" height="60px" class="mx-auto d-block">
                    <h5 class="text-center mt-2 mb-2 font-weight-bold">Sistem Informasi<br/>Manajemen Saksi Pemilu</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger fade show mb-4 p-1 text-center" role="alert">
                                <small>{{ $errors->first() }}</small>
                            </div>
                        @endif
                        <div id="form-div" class="d-flex align-items-center p-0 mb-4">
                            <i class="mdi mdi-account mdi-18px"></i>
                            <input type="text" class="form-control" id="inputUsername" name="username" placeholder="username" maxlength="20" value="{{ old('username') }}" required autofocus>
                        </div>

                        <div id="form-div" class="d-flex align-items-center p-0 mb-4">
                            <i class="mdi mdi-lock mdi-18px"></i>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="password" maxlength="20" required>
                        </div>

                        <button type="submit" id="btn-login" class="btn btn-block btn-lg m-0">LOGIN</button>

                    </form>
                </div>
            </div>
          
        </div>

      </div>
    </div>
    <script>
        $(document).on('keydown', ['#inputUsername','inputPassword'], function(e) {
            if (e.keyCode == 32) return false;
        });
    </script>
  </body>
</html>