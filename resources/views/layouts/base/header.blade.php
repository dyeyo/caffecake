<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header">
      <a class="navbar-brand" href="/home">
      <b>
        <img src="" alt="WaffCake" class="dark-logo">
        {{--  <img src="" alt="WaffCake" class="light-logo">  --}}
      </b>
        <img src="" alt="WaffCake" class="dark-logo">
        <img src="" class="light-logo" alt="WaffCake"></span> </a>
    </div>
    <div class="navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="/home"><i class="ti-menu"></i></a> </li>
        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="/home"><i class="icon-menu ti-menu"></i></a> </li>
      </ul>
      <ul class="navbar-nav my-lg-0">
        <li class="nav-item dropdown">
          <li class="nav-item dropdown u-pro">
            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="hidden-md-down">
            {{ Auth()->user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
            <div class="dropdown-menu dropdown-menu-right animated flipInY">
              <!-- <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> Mi Perfil</a> -->
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item">
                <i class="fa fa-power-off"></i>
                Cerrar Sesion
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </a>
            </div>
          </li>
      </ul>
    </div>
  </nav>
</header>
