 <div class="card-group">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="icon-screen-desktop"></i></h3>
              <p class="text-muted">CODIGO CLIENTE FRECUENTE</p>
            </div>
            <div class="ml-auto">
            @isset($codeClient)
              @foreach($codeClient as $code )
                <h2 class="counter text-primary">{{$code->codReference}}</h2>
              @endforeach
            @endisset
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
              <h3><i class="icon-screen-desktop"></i></h3>
              <p class="text-muted">TOTAL COMPRAS</p>
            </div>
            <div class="ml-auto">
              @isset($countPurachasesClientRegular)
                <h2 class="counter text-primary">{{$countPurachasesClientRegular}}</h2>
              @endisset
              @isset($countPurachases)
                <h2 class="counter text-primary">{{$countPurachases}}</h2>
              @endisset
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
              <h3><i class="icon-note"></i></h3>
              <p class="text-muted">TOTAL REFERIDOS</p>
            </div>
            <div class="ml-auto">
              @isset($codReferenceClient)
                <h2 class="counter text-primary">{{$codReferenceClient}}</h2>
              @endisset
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Agregar Referido
          </button>
              <hr>
              <h5 class="card-title">MIS COMPRAS</h5>
              <table  class="example table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre Completo</th>
                      <th>Fecha de Compra</th>
                    </tr>
                  </thead>
                  <tbody>
                  @isset($purachases)
                    @foreach($purachases as $purachase)
                      <tr>
                        <td class="link">{{ $purachase->id }}</td>
                        <td>{{ $purachase->codReference }}</td>
                        <td>{{ $purachase->created_at }}</td>
                      </tr>
                    @endforeach
                  @endisset
                  @foreach($purachasesClientRegular as $clientRegular)
                    <tr>
                      <td class="link">{{ $clientRegular->id }}</td>
                      <td class="link">{{ $clientRegular->name }} {{ $clientRegular->lastname }}</td>
                      <td>{{ $clientRegular->created_at }}</td>
                    </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Referido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user"  action="/sendemail" method="POST">
          {{csrf_field()}}
          <div class="form-group">
          <label for="emialReferide">Correo electronico Referido</label>
          <input type="email" class="form-control" name="emialReferide" id="emialReferide" placeholder="Correo electronico Referido">
          @isset($codeClient)
            @foreach($codeClient as $code )
              <input type="hidden" name="codReference" value="{{ $code->codReference }}">
            @endforeach
          @endisset
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Enviar email</button>
        </form>

      </div>
    </div>
  </div>
</div>