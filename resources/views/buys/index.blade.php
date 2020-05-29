@extends('layouts.base.base')
@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Bienveido a WaffCake</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="javascript:void(0)">Inicio</a>
          </li>
          <li class="breadcrumb-item active">Ventas ></li>
        </ol>
        <button
          type="button"
          class="btn btn-primary  mr-2"
          data-toggle="modal"
          data-target="#myModal"
        >
          Realizar Venta
        </button>
        <button
          type="button"
          class="btn btn-primary"
          data-toggle="modal"
          data-target="#modalRegistro"
        >
          Registrar Cliente
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Lista de Ventas</h4>
          @if(Session::has('message'))
          <div class="alert alert-success">
            {!! Session::get('message') !!}
          </div>
          @endif
          <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                <th>
                  Acciones
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
                <th>
                  Acciones
                </th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($buys as $buy)
              <tr role="row" class="odd">
                <td>{{$buy->user->name .' '. $buy->user->lastname}}</td>
                <td>{{$buy->user->numIndentificate}}</td>
                <td>{{$buy->user->mobile}}</td>
                <td>{{$buy->user->codReference}}</td>
                <td>
                  <form
                    class="user"
                    action="{{route('activateTarjet', $buy->id)}}"
                    method="post"
                  >
                    {{ method_field("put") }}
                    {{ csrf_field() }}
                    <input required
                      type="hidden"
                      name="codReference"
                      value="666"
                    />
                    <button
                      class="btn btn-btn-outline-light"
                      type="submit"
                    >
                      RENOVAR
                    </button>
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
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Buscar cliente frecuente</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Buscar cliente nuevos</a>
              </li>
            </ul>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <div class="modal-body">
                <div id="alerta"></div>
                <form class="user"  action="{{route('buys_create')}}" method="post">
                  {{ method_field('post') }}
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label"
                      >Codigo de cliente frecuente:</label
                    >
                    <select required class="codReference" name="userId" onchange="specialCustomer()" name="codReference" style="width: 100%;">
                      @foreach($frecuentClients as $client)
                        <option value="{{ $client->id }}">
                          {{ $client->codReference }}
                        </option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-primary">Realizar Venta</button>
                </form>
              </div>
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
              <div class="modal-body">
                <div id="alerta"></div>
                <form class="user"  action="{{route('buys_create')}}" method="post">
                  {{ method_field('post') }}
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label"
                      >Codigo de cliente por Indentificación</label
                    >
                    <select required class="codReference" name="userId"  name="numIndentificate" style="width: 100%;">
                      @foreach($clients as $client)
                        <option value="{{ $client->id }}">
                          {{ $client->numIndentificate }}
                        </option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-primary">Realizar Venta</button>
                </form>
              </div>
            </div>
          </div>
    </div>
    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Registrar cliente nuevo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div id="alerta"></div>
              <form method="POST" action="{{ route('createClient') }}">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Nombres</label>
                  <div class="col-md-6">
                    <input required id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Apellidos</label>
                  <div class="col-md-6">
                    <input required id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" >
                    @error('lastname')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Num Indentificación</label>
                  <div class="col-md-6">
                    <input required id="numIndentificate" type="text" class="form-control @error('numIndentificate') is-invalid @enderror" name="numIndentificate" value="{{ old('numIndentificate') }}" required autocomplete="numIndentificate" >
                    @error('numIndentificate')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>
                  <div class="col-md-6">
                      <input required id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Num de Contacto</label>
                    <div class="col-md-6">
                        <input required id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" required autocomplete="mobile">
                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Registrar Cliente</button>
          </form>
          </div>
        </div>
      </div>
    </div>
 </div>
</div>
    @endsection

