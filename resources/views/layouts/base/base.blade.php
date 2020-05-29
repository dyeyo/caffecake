<!DOCTYPE html>
<html lang="en">
@routes
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            WallCake
        </title>

        <link href="{{ asset('js/morrisjs/morris.css')}}" rel="stylesheet" />
        <link|
            href="{{ asset('js/toast-master/css/jquery.toast.css')}}"
            rel="stylesheet"
        />
        <link href="{{ asset('css/style.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/login.css')}}" rel="stylesheet" />
        <link
            href="{{ asset('css/pages/dashboard1.css')}}"
            rel="stylesheet"
        />
        <link rel="stylesheet" type="text/css" href="hhttps://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    </head>

    <body class="skin-default fixed-layout">
      <div id="main-wrapper">

          @include('layouts.base.nav')


        <div class="page-wrapper">
          @yield('content')
        </div>
      <footer class="footer">
        © 2018 Eliteadmin by themedesigner.in
      </footer>
      </div>
      <script src="{{ asset ('js/jquery/jquery-3.2.1.min.js')}}"></script>
      <script src="{{ asset ('js/popper/popper.min.js')}}"></script>
      <script src="{{ asset ('js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
      <script src="{{ asset ('js/perfect-scrollbar.jquery.min.js')}}"></script>
      <script src="{{ asset ('js/waves.js')}}"></script>
      <script src="{{ asset ('js/sidebarmenu.js')}}"></script>
      <script src="{{ asset ('js/custom.min.js')}}"></script>
      <script src="{{ asset ('js/raphael/raphael-min.js')}}"></script>
      <script src="{{ asset ('js/morrisjs/morris.min.js')}}"></script>
      <script src="{{ asset ('js/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
      <script src="{{ asset ('js/toast-master/js/jquery.toast.js')}}"></script>
      <script src="{{ asset ('js/toast-master/js/jquery.toast.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
      <script src="{{ asset ('js/main.js')}}"></script>
    </body>
  </html>

