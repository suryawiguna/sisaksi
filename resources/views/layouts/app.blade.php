<!DOCTYPE html>
<html lang="id">

  <body>
    @include('layouts.navbar')

    <div class="container-fluid">
      <div class="row">
        @include('layouts.sidenav')

        <div id="overlay"></div>
        
        <div id="main" class="col">
          @yield('content')
        </div>

      </div>
    </div>
  </body>
</html>