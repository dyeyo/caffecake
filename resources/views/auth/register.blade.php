@extends('layouts.app')

@section('content')
<div class="container">
  <br>
	<a href="https://clientes.waffcake.com" style="margin-bottom:5px"><img src="https://www.waffcake.com/img/logo_wk_02.png" alt="wafecake"></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>REGISTRO: PROGRAMA DE BENEFICIOS WAFFCAKE</h3>
					        <p>
                    ¡Bienvenido al programa de beneficios de Waffcake ! ¡Regístrate en 1 solo paso y
                    disfruta de la delicia del waffle con descuentos especiales!
                  </p>
				        </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">Apellido</label>
                          <div class="col-md-6">
                              <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" >
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
                              <input id="numIndentificate" type="number" class="form-control @error('numIndentificate') is-invalid @enderror" name="numIndentificate" value="{{ old('numIndentificate') }}" required autocomplete="numIndentificate" >
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                          </div>

                        <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                          <div class="col-md-6">
                              <input id="mobile" type="number"
                                maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                class="form-control @error('mobile') is-invalid @enderror"
                                name="mobile" required autocomplete="mobile">
                                @error('mobile')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>
                      </div>
                      <div class="col-lg-12" style="margin-left: 150px;">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terminos" require class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">
                              He leído y acepto términos y condiciones –
                              <a href="{{route('terminos_condicones')}}" target="_blank">
                                Ver aquí
                              </a>
                            </label>
                          </div>
                      </div>
                      <hr>
                      <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            Inscribirme
                          </button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
