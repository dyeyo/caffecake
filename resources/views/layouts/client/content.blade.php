<div class="alert alert-succees" style="color: #fff;;background: #25a7bd">
  Este es tu perfil del Programa de Beneficios WaffcaCke, aquí podrás tener toda la
  información de tus compras y los descuentos obtenidos.
  {{-- <img src="{{ asset('img/register.jpg') }}" width="20%" alt=""> --}}
  <h1>IMAGEN CENTRADA, VER ULTIMA HOJA DEL DOCUMENTO</h1>
</div>
 <div class="card-group">

  <div class="card mr-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div id="codigo">
              <h3><i class="fas fa-barcode"></i></h3>
              <p class=""><b>Tú codigo:</b></p>
              <span>Es tu identificación en el programa úsalo para hacer efectivo el descuento.
              </span>
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
  <div class="card mr-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="fas fa-id-card"></i></h3>
              <p class=""><b>Tarjeta cliente fiel</b></p>
              <span>Acumula descuentos por tus compras. Obtienes el 5% a la
                quinta compra, el 10% a la décima compra y el 50% a la doceava compra. Puedes
                acumular tus descuentos. Actívala con la primera compra.</span>
            </div>
            <div class="ml-auto">
              @isset($conteoPurachasesEspecial)
                <h2 class="counter text-primary">{{ $conteoPurachasesEspecial }}</h2>
              @endisset
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card ">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="fas fa-bullhorn"></i></h3>
              @if(Session::has('message'))
                <div class="alert alert-success">
                  {!! Session::get('message') !!}
                </div>
              @endif
              <p class=""><b>Pasa la voz waffcake- Referidos</b></p>
              <span>Comparte la delicia del wafle con un amigo. Recuerda que podrás hacer efectivo tu descuento
                del 5% cuando tu amigo se registre y haga su primera compra. <b>¡Eres nuestra razón de ser!</b></span>
                <b><a href="">Conoce más aquí</a></b>
                  @isset($codeClient)
                  <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Agregar Referido
                    </button>
                  @endisset
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
            <hr>
            <h5 class="card-title"><i class="fas fa-cart-arrow-down"></i> Historial de compras tarjeta cliente fiel</h5>
            <p>Conoce el historial de tus compras</p>
            <table  class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Codigo Usario / Codigo de Compra</th>
                    <th>Fecha de Compra</th>
                  </tr>
                </thead>
                <tbody>
                @isset($purachasesEspecial)
                  @foreach($purachasesEspecial as $purachase)
                    <tr>
                      <td>{{ $purachase->codReference }}</td>
                      <td>{{ Carbon\Carbon::parse($purachase->created_at)->format('d-m-Y') }}</td>
                    </tr>
                  @endforeach
                @endisset

                </tbody>
            </table>
        </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card">
        <div class="card-body">
          @if(Session::has('encuestaOk'))
            <div class="alert alert-success">
              {!! Session::get('encuestaOk') !!}
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            </div>
          @endif
          <hr>
          <h5 class="card-title">Tu opinión cuenta</h5>
          <p>De 1 a 5, como calificas el programa de beneficios waffcake, siendo 1 muy malo y 5 muy
            BUENO
           <b> ¿Qué le adicionarías?</b></p>
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
                          <form action="{{route('responseSurveys')}}" method="post"  id="responseSurveys" preventDefault();>
                            @csrf
                              @if($surveys->type == 1)
                                <label for="SI">SI</label>
                                <input id="SI" name="response" required type="radio" value="SI">
                                <label for="NO">NO</label>
                                <input id="NO" name="response" required type="radio" value="NO">
                              @else
                                <input id="response" required name="response" type="number" value="" class="form-control">
                              @endif
                              <input  name="userId" type="hidden" value="{{Auth()->user()->id}}">
                              <input  name="surveysId" type="hidden" value="{{$surveys->id}}">
                            <button  class="btn btn-secundary" type="submit">
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
<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-body">
        <ul style="list-style: none;">
          <li><b><i class="fa fa-exclamation"></i> 1</b>. En cualquiera de los dos beneficios podrás acumular tus descuentos, pero no
            sumaran los descuentos de los dos beneficios al mismo tiempo</li>
          <li><b><i class="fa fa-exclamation"></i> 2. WAFFCAKE</b> solo se podrán hacer efectivo si los pedidos se realizan a través
            de la línea directa de <b>WAFFCAKE 3128907331.</b> A los pedidos que se realicen</li>
          <li><b><i class="fa fa-exclamation"></i> 3</b>. Los descuentos <b>TARJETA CLIENTE FIEL y PASA LA VOZ WAFFCAKE</b> no
            podrán efectuarse al mismo tiempo y bajo una sola compra, esto quiere decir <b>no son acumulables los descuentos de estos dos beneficios. Deben
              solicitarse por separado.</b></li>
          <li><b><i class="fa fa-exclamation"></i> 4</b>. Los descuentos efectuados para la <b> TARJETA CLIENTE FIEL y PASA LA VOZ
            WAFFCAKE, aplican solo para la compra de un producto por cliente no
            por compras totales.</b></li>
        </ul>
        <ul style="list-style: none;">
          <li>Conoce más del programa aquí (Términos y condiciones)</li>
          <li>  Preguntas frecuentes</li>
        </ul>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Compartir con un amigo</button>
        </form>

      </div>
    </div>
  </div>
</div>