@extends('layouts.base.base')
@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Bienvenido a WaffCake</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Inicio</a>
          </li>
          <li class="breadcrumb-item active">Ventas ></li>
      </ol>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
        <a href="{{route('buys_create')}}" class="btn btn-primary btn-block mr-2">
          Realizar Venta
        </a>
        <br>
          <h4 class="card-title">Lista de Ventas (Clientes fiel)</h4>
          @if(Session::has('messageReferide'))
          <div class="alert alert-warning">
            {!! Session::get('messageReferide') !!}
          </div>
          @endif
          @if(Session::has('message'))
          <div class="alert alert-success">
            {!! Session::get('message') !!}
          </div>
          @endif
          <table  class="example table table-striped table-bordered" style="width:100%">
            <thead>
              <tr role="row">
                <th>
                  Nombre Completo
                </th>
                <th>
                  Numero de ID
                </th>
                <th>
                  Numero de Celular
                </th>
                <th>
                  Codigo de Referencia
                </th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>
                  Nombre Completo
                </th>
                <th>
                  Numero de ID
                </th>
                <th>
                  Numero de Celular
                </th>
                <th>
                  Codigo de Referencia
                </th>

              </tr>
            </tfoot>
            <tbody>
              @foreach($buys as $buy)
              <tr role="row" class="odd">
                <td>{{$buy->clientCard->user->name .' '. $buy->clientCard->user->lastname}}</td>
                <td>{{$buy->clientCard->user->numIndentificate}}</td>
                <td>{{$buy->clientCard->user->mobile}}</td>
                <td>{{$buy->clientCard->codReference}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Lista de Ventas (Clientes Regulares)</h4>
          <table  class="example table table-striped table-bordered" style="width:100%">
            <thead>
              <tr role="row">
                <th>
                  Nombre Completo
                </th>
                <th>
                  Numero de ID
                </th>
                <th>
                  Numero de Celular
                </th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>
                  Nombre Completo
                </th>
                <th>
                  Numero de ID
                </th>
                <th>
                  Numero de Celular
                </th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($buysRegular as $buy)
              <tr role="row" class="odd">
                <td>{{$buy->user->name .' '. $buy->user->lastname}}</td>
                <td>{{$buy->user->numIndentificate}}</td>
                <td>{{$buy->user->mobile}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> -->
</div>
@endsection

