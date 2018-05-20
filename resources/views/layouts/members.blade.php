
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>SRPTN - MADA</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/offcanvas.css') }}" rel="stylesheet">
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="{{ route('home') }}">SRPT-NKEA</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('members.warta.index') }}">Warta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('members.bicara.index') }}">Perbicaraan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('members.borangh.index') }}">Borang-H</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('members.borangk.index') }}">Borang-K</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('members.aduan.index') }}">Aduan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu Asas</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('members.negeri.index') }}">Negeri</a>
              <a class="dropdown-item" href="{{ route('members.daerah.index') }}">Daerah</a>
              <a class="dropdown-item" href="{{ route('members.wilayah.index') }}">Wilayah</a>
              <a class="dropdown-item" href="{{ route('members.mukim.index') }}">Mukim</a>
              <a class="dropdown-item" href="{{ route('members.lokaliti.index') }}">Lokaliti</a>
              <a class="dropdown-item" href="{{ route('members.fasa.index') }}">Fasa</a>
              <a class="dropdown-item" href="{{ route('members.pakej.index') }}">Pakej</a>
              <a class="dropdown-item" href="{{ route('members.blok.index') }}">Blok</a>
              <a class="dropdown-item" href="{{ route('members.lot.index') }}">Lot</a>
              <a class="dropdown-item" href="{{ route('members.bank.index') }}">Bank</a>
              <a class="dropdown-item" href="{{ route('members.ptj.index') }}">PTJ</a>
              <a class="dropdown-item" href="{{ route('members.staff.index') }}">Maklumat Staff</a>
              <a class="dropdown-item" href="{{ route('members.kategori.index') }}">Kategori Bayaran</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu Status</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('members.status_aduan.index') }}">Status Aduan</a>
              <a class="dropdown-item" href="{{ route('members.status_milik.index') }}">Status Milik</a>
              <a class="dropdown-item" href="{{ route('members.status_bicara.index') }}">Status Perbicaraan</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laporan</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Laporan 1</a>
            </div>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <font color='red'>{{ __('Logout') }}</font>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </nav>

    <!-- <div class="nav-scroller bg-white box-shadow">
      <nav class="nav nav-underline">
        <a class="nav-link active" href="#">Dashboard</a>
        <a class="nav-link" href="#">
          Friends
          <span class="badge badge-pill bg-light align-text-bottom">27</span>
        </a>
        <a class="nav-link" href="#">Explore</a>
        <a class="nav-link" href="#">Suggestions</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link" href="#">Link</a>
      </nav>
    </div> -->

    <main role="main" class="container">
      <br />
      @yield('content')     
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/holder.min.js') }}"></script>
    <script src="{{ asset('js/offcanvas.js') }}"></script>
  </body>
</html>
