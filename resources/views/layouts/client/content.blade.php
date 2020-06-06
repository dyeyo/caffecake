 <div class="card-group">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="fas fa-crown"></i></h3>
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
              <h3><i class="fas fa-shopping-bag"></i></h3>
              <p class="text-muted">TOTAL COMPRAS TARJETA</p>
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
              <h3><i class="fas fa-bullhorn"></i>></h3>
              <p class="text-muted">TOTAL REFERIDOS</p>
            </div>
            <div class="ml-auto">
              @isset($codReferenceClient)
                <h2 class="counter text-primary">{{$codReferenceClient}}</h2>
                @if($codReferenceClient > 0)
                  <h5>Usted es acreedor de un {{$codReferenceClient * 5}}% de su compra </h5>
                  <p>solicitar su compra desde el area de descuento por referido</p>
                @endif
              @endisset
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-7">
    <div class="card">
        <div class="card-body">
        @if(Session::has('message'))
          <div class="alert alert-success">
            {!! Session::get('message') !!}
          </div>
        @endif
        @isset($codeClient)
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Agregar Referido
          </button>
        @endisset

            <hr>
            <h5 class="card-title">MIS COMPRAS</h5>
            <table  class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Codigo Usario / Codigo de Compra</th>
                    <th>Fecha de Compra</th>
                  </tr>
                </thead>
                <tbody>
                @isset($purachases)
                  @foreach($purachases as $purachase)
                    <tr>
                      <td>{{ $purachase->codReference }}</td>
                      <td>{{ $purachase->created_at }}</td>
                    </tr>
                  @endforeach
                @endisset
                @foreach($purachasesClientRegular as $clientRegular)
                  <tr>
                    <td class="link">{{ $clientRegular->name }} {{ $clientRegular->lastname }}</td>
                    <td>{{ $clientRegular->created_at }}</td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card">
        <div class="card-body">
          <!-- <div id="response">
          </div> -->
          @if(Session::has('encuestaOk'))
            <div class="alert alert-success">
              {!! Session::get('encuestaOk') !!}
            </div>
          @endif
          <hr>
          <h5 class="card-title">ENCUESTAS</h5>
            <table  class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Pregunta</th>
                    <th>Respuesta</th>
                  </tr>
                </thead>
                <tbody>
                  @isset($surveysActive)
                    @foreach($surveysActive as $surveys)
                    @if($surveys->ResponseEncuesta)
                      <tr>
                        <td>{{ $surveys->title }}</td>
                        <td>
                          <form action="{{route('responseSurveys')}}" method="post"  id="responseSurveys">
                          <!-- <form action="javacript:void(0)" id="responseSurveys" method="POST" name="responseSurveys"> -->
                            @csrf
                              @if($surveys->type == 1)
                                <label for="SI">SI</label>
                                <input id="SI" name="response" required type="radio" value="SI">
                                <label for="NO">NO</label>
                                <input id="NO" name="response" required type="radio" value="NO">
                              @else
                                <input id="response" required name="response" type="text" value="" class="form-control">
                              @endif
                              <input  name="userId" type="hidden" value="{{Auth()->user()->id}}">
                              <input  name="surveysId" type="hidden" value="{{$surveys->id}}">
                            <button  class="btn btn-secundary" onclick="createResponseSurvey()">
                              Enviar
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endif
                    @endforeach
                  @endisset
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