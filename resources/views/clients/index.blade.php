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
            <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
            <li class="breadcrumb-item active">Clientes</li>
        </ol>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Lista de Clientes (Frecuentes)</h4>
              @if(Session::has('message'))
                <div class="alert alert-success">
                  {!! Session::get('message') !!}
                </div>
              @endif
              <table class="example table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Nombre Completo</th>
                    <th>Num identificación</th>
                    <th>Codigo de Cliente</th>
                    <th>Celular</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nombre Completo</th>
                    <th>Num identificación</th>
                    <th>Codigo de Cliente</th>
                    <th>Celular</th>
                    <th>Eliminar</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($clients as $client)
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{$client->name }}  {{$client->lastname }}</td>
                      <td>{{$client->numIndentificate }}</td>
                      <td>{{$client->codReference }}</td>
                      <td>{{$client->mobile }}</td>
                      <td>
                        <form class="user"  action="{{route('deleteUser', $client->userId)}}" method="post">
                          {{ method_field('delete') }}
                          {{csrf_field()}}
                          <button class="btn btn-btn-outline-light"  onclick="return confirm('¿Esta seguro de eliminar este registro?')"  type="submit">ELIMINAR</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
    </div>
</div>
</div>
@endsection