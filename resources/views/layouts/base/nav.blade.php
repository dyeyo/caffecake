@include('layouts.base.header')
<aside class="left-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        @if(Auth()->user()->roleId == 1)
          <li>
            <a class="waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false">
            <i class="fas fa-home"></i><span class="hide-menu">Dashboard</span>
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
            <i class="fas fa-cart-arrow-down"></i><span class="hide-menu">Mis compras</span>
            </a>
          </li>
        @endif
      </ul>
    </nav>
</aside>

