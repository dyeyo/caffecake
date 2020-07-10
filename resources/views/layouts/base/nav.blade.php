@include('layouts.base.header')
<aside class="left-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        @if(Auth()->user()->roleId == 1)
          <li>
            <a class="waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false">
            <i class="fas fa-home"></i><span class="hide-menu">Inicio</span>
            </a>
          </li>
          <li class="nav-small-cap">--- TIENDA</li>
          <li>
            <a class="waves-effect waves-dark" href="{{ route('buys') }}" aria-expanded="false">
            <i class="fas fa-money-bill-wave-alt"></i><span class="hide-menu">Listado de Ventas</span>
            </a>
          </li>

          <li class="nav-small-cap">--- ADMINISTRACIÓN</li>
            <li>
            <a class="waves-effect waves-dark" href="{{ route('clients') }}" aria-expanded="false">
              <i class="fas fa-users"></i><span class="hide-menu">Consolidado de Clientes</span>
            </a>
            <li>
            <a class="waves-effect waves-dark" href="{{ route('allSurveys') }}" aria-expanded="false">
            <i class="fas fa-clipboard-list"></i><span class="hide-menu">Area de Encuestas</span>
            </a>
          </li>
        @else
          <li>
            <a class="waves-effect waves-dark" href="/home" aria-expanded="false">
            <span class="hide-menu">Mis compras</span>
            </a>
          </li>
          <li>
              <img src="{{ asset('img/bg.jpg') }}" width="100%" height="100%" style="height: 30pc;
              margin-top: 80%;" alt="">
          </li>
        @endif
      </ul>
    </nav>
</aside>

