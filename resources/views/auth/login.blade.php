@extends('layouts.app') @section('content')
<div class="preloader">
  <div class="loader">
    <div class="loader__figure"></div>
    <p class="loader__label">Elite admin</p>
  </div>
</div>
<section id="wrapper" class="login-register login-sidebar">
  <div class="login-box card">
    <div class="card-body">
		<img src="https://www.waffcake.com/img/logo_wk_02.png" alt="WaffCake">
      <form
        method="POST"
        class="form-horizontal form-material"
        id="loginform"
        action="{{ route('login') }}"
      >
        @csrf
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input
              placeholder="Correo Electronico"
              id="email"
              type="email"
              class="form-control @error('email') is-invalid @enderror"
              name="email"
              value="{{ old('email') }}"
              required
              autocomplete="email"
              autofocus
            />
          </div>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>Error, correo incorrecto</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input
              type="password"
              required=""
              placeholder="Contraseña"
              id="password"
              class="form-control @error('password') is-invalid @enderror"
              name="password"
              autocomplete="current-password"
            />
          </div>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>Error, contraseña incorrecta</strong>
          </span>
          @enderror
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button
              class="btn btn-info btn-lg btn-block text-uppercase btn-rounded"
              type="submit"
            >
              Entrar
            </button>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social">
              <a
                href="javascript:void(0)"
                class="btn btn-facebook"
                data-toggle="tooltip"
                title="Login with Facebook"
              >
                <i aria-hidden="true" class="fa fa-facebook"></i>
              </a>
              <a
                href="javascript:void(0)"
                class="btn btn-googleplus"
                data-toggle="tooltip"
                title="Login with Google"
              >
                <i aria-hidden="true" class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
        </div> -->
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            Aun no tienes cuenta?
            <a href="{{ route('register') }}" class="text-primary m-l-5"
              ><b>Registrate</b></a
            >
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

 @endsection
