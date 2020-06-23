@extends('layouts.base.base')
@section('content')
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        @if(Auth()->user()->roleId == 1)
          <h4 class="text-themecolor">Bienveido
          {{ Auth()->user()->name }} al perfil administrador del programa de beneficios Waffcake, la wafflería del
          Sabora </h4>
        @else
          <h4 class="text-themecolor">Bienvenido {{ Auth()->user()->name }} a Waffcake, la wafflería del
          Sabora </h4>
        @endif
      </div>
      <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0)">Inicio</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
    @if(Auth()->user()->roleId == 1)
      @include('layouts.admin.content')
    @else
      @include('layouts.client.content')
    @endif
  </div>
@endsection