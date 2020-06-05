 <div class="card-group">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="fas fa-users"></i></h3>
              <p class="text-muted">TOTAL CLIENTES</p>
            </div>
            <div class="ml-auto">
              <h2 class="counter text-primary">{{ $clients }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <button type="button" class="btn btn-btn-outline-light btn-sm"  data-toggle="modal" data-target="#exampleModal">
                <h3><i class="fas fa-crown"></i></h3>
              </button>
              <p class="text-muted">CLIENTE ESPECIALES</p>
            </div>
            <div class="ml-auto">
              <h2 class="counter text-cyan">{{$especialClients}}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="fas fa-shopping-bag"></i></h3>
              <p class="text-muted">TOTAL VENTAS</p>
            </div>
            <div class="ml-auto">
              <h2 class="counter text-purple">{{ $totalBuys }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Buscar cliente frecuente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Buscar cliente nuevos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Agregar cliente</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <div class="card-body">
                <div id="alerta"></div>
                <div id="activacion">
                  <form id="formActivacion"  action="{{route('activateTarjet')}}" method="post">
                    {{ method_field('post') }}
                    {{csrf_field()}}
                    <input type="hidden" name="codReference" value={{rand(1001,5000) }}">
                    <input type="hidden" name="state" value="1">
                    <input type="hidden" name="userId" value="">
                  </form>
                </div>
                <form class="user" action="{{route('buys_store')}}" method="post">
                  {{ method_field('post') }}
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">
                      Codigo de cliente frecuente:
                    </label>
                    <select required class="codReference"  onchange="specialCustomer()" name="regularClienteId" style="width: 100%;">
                      <option value="">--SELECCIONE UNA OPCIÓN</option>
                      @foreach($frecuentClients as $client)
                        <option value="{{ $client->id }}">
                          {{ $client->codReference }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" id="ventaDoce" class="btn btn-primary">Realizar Venta</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
              <div class="card-body">
                <!-- <div id="alerta"></div> -->
                <form class="user"  action="{{route('buys_storeRegular')}}" method="post">
                  {{ method_field('post') }}
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">
                      Codigo de cliente por Indentificación
                    </label>
                    @isset($listClients)
                    <select required class="codReference" name="userId"  style="width: 100%;">
                      <option value="">--SELECCIONE UNA OPCIÓN</option>
                      @foreach($listClients as $client)
                        <option value="{{ $client->id }}">
                          {{ $client->numIndentificate }}
                        </option>
                      @endforeach
                    </select>
                    @endisset
                  </div>
                  <div class="form-group">
                    <button type="submit"  class="btn btn-primary">Realizar Venta</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane" id="tabs-3" role="tabpanel">
              <div class="modal-body">
                <!-- <div id="alerta"></div> -->
                <form method="POST" action="{{ route('createClient') }}">
                  {{csrf_field()}}
                  <div class="form-group row">
                    <label for="name" class="col-md-12 col-form-label ">Nombre</label>
                    <div class="col-md-12">
                      <input required id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-md-12 col-form-label ">Apellido</label>
                    <div class="col-md-12">
                      <input required id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" >
                      @error('lastname')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-md-12 col-form-label ">Num Indentificación</label>
                    <div class="col-md-12">
                      <input required id="numIndentificate" type="text" class="form-control @error('numIndentificate') is-invalid @enderror" name="numIndentificate" value="{{ old('numIndentificate') }}" required autocomplete="numIndentificate" >
                      @error('numIndentificate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-md-12 col-form-label ">Correo Electronico</label>
                    <div class="col-md-12">
                        <input required id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                      <label for="password" class="col-md-12 col-form-label ">Num de Contacto</label>
                      <div class="col-md-12">
                          <input required id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" required autocomplete="mobile">
                          @error('mobile')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  <div class="form-group row">
                    <button type="submit"  class="btn btn-primary btn-block">Realizar Cliente</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar Codigo Referido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="totalReferides"></div>
        <form id="searchCode" action="javascript:void(0)" name="searchCode" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <label for="emialReferide">Codigo Referido</label>
            <input type="text" class="form-control" name="codeReferide" id="codeReferide" placeholder="Codigo Referido">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  id="btnsearchCode" onclick="countReferences()" class="btn btn-primary">Consultar Codigo</button>
        </form>
        <form id="formPagar" style="display: none;" action="{{route('updateUserReferides')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" class="form-control" id="userReferide" name="userReferide" >
          <button type="submit"  class="btn btn-primary">Pagar</button>
        </form>
      </div>
    </div>
  </div>
</div>