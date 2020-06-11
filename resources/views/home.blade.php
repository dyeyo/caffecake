@extends('layouts.base.base')
@section('content')
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Bienvendido {{ Auth()->user()->name }} a WaffCake</h4>
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