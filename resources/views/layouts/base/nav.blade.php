@include('layouts.base.header')
<aside class="left-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        @if(Auth()->user()->roleId == 1)
          <li class="nav-small-cap">--- TIENDA</li>
          <li>
            <a class="waves-effect waves-dark" href="{{ route('buys') }}" aria-expanded="false">
              <i class="icon-speedometer"></i><span class="hide-menu">Área de Ventas</span>
            </a>
          </li>

          <li class="nav-small-cap">--- ADMINISTRACIÓN</li>
            <li>
            <a class="waves-effect waves-dark" href="{{ route('clients') }}" aria-expanded="false">
              <i class="icon-speedometer"></i><span class="hide-menu">Área de Clientes</span>
            </a>
          </li>
        @else
          <li>
            <a class="waves-effect waves-dark" href="/home" aria-expanded="false">
              <i class="icon-speedometer"></i><span class="hide-menu">Mis compras</span>
            </a>
          </li>
        @endif
      </ul>
    </nav>
</aside>

