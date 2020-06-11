@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro</div>
                <div class="card-body">
                  @if(Session::has('message'))
                    <div class="alert alert-danger">
                      {!! Session::get('message') !!}
                    </div>
                  @endif
                  <form method="POST" action="{{ route('create_referide') }}">
                    {{ method_field('post') }}
                    @csrf
                    <div class="form-group row">
                      <label for="userReferide" class="col-md-4 col-form-label text-md-right">Codigo de usuario</label>
                      <div class="col-md-6">
                        <input id="userReferide" type="text" value="<?php echo $_GET["onlyCode"]; ?>"  class="form-control" name="userReferide" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Nombres</label>
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
                      <label for="name" class="col-md-4 col-form-label text-md-right">Apellidos</label>
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
                        <input id="numIndentificate" type="text" class="form-control @error('numIndentificate') is-invalid @enderror" name="numIndentificate" value="{{ old('numIndentificate') }}" required autocomplete="numIndentificate" >
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
                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confrimar Contraseña</label>
                      <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right">Num de Contacto</label>
                      <div class="col-md-6">
                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" required autocomplete="mobile">
                        @error('mobile')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12" style="margin-left: 150px;">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="terminos" id="customCheck1">
                            <label class="custom-control-label"  for="customCheck1">
                              <a href="/terminos_condiciones" target="_blank">
                                Aceptar Términos y condiciones
                              </a>
                            </label>
                          </div>
                      </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Registro
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
