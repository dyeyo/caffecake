 <div class="card-group">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="icon-screen-desktop"></i></h3>
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
                <h3><i class="icon-eye"></i></h3>
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
              <h3><i class="icon-doc"></i></h3>
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