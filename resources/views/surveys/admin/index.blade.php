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
            <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
            <li class="breadcrumb-item active">Encuestas</li>
            <li class="breadcrumb-item">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar Encuesta
              </button>
            </li>
        </ol>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Lista de Encuestas</h4>
              @if(Session::has('message'))
                <div class="alert alert-success">
                  {!! Session::get('message') !!}
                </div>
              @endif
              <table class="example table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Titulo de encuesta</th>
                    <th>Tipo de encuesta</th>
                    <th>Estado</th>
                    <th>Ver Resultados</th>
                    <th>Activar/Desactivar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Titulo de encuesta</th>
                    <th>Tipo de encuesta</th>
                    <th>Estado</th>
                    <th>Ver Resultados</th>
                    <th>Activar/Desactivar</th>
                    <th>Eliminar</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($surveys as $survey)
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{ $survey->title }}</td>
                      <td>{{ $survey->type == 1 ? 'SI/NO' : 'Calificación por número'}}</td>
                      <td>{{ $survey->state == 1 ? 'ACTIVA' : 'DESACTIVADA'}}</td>
                      <td>
                        <form class="user"  action="{{route('surveysResults', $survey->id)}}" method="post">
                          {{csrf_field()}}
                          <input type="hidden" name="id" value="{{$survey->id}}">
                          <button class="btn btn-success"  type="submit">Ver Resultados</button>
                        </form>
                      </td>
                      <td>
                        @if($survey->state == 2)
                          <form class="user"  action="{{route('activateTarjet')}}" method="post">
                            {{ method_field('post') }}
                            {{csrf_field()}}
                            <input type="hidden" name="state" value="1">
                            <button class="btn btn-primary"  type="submit">ACTIVAR</button>
                          </form>
                        @else
                          <button class="btn btn-btn-outline-light">DESACTIVAR</button>
                        @endif
                      </td>

                      <td>
                        <form class="user"  action="{{route('deleteUser', $survey->id)}}" method="post">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Encuesta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formActivacion"  action="{{route('surveysCreate')}}" method="post">
        {{ method_field('post') }}
        {{csrf_field()}}
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">
            Titulo/Pregunta de encuesta
          </label>
          <input type="text" name="title" class="form-control" require placeholder="Titulo/Pregunta de encuesta">
          <input type="hidden" name="state" value="1">
          <label for="recipient-name" class="col-form-label">
            Tipo de encuesta
          </label>
          <select name="type" id="" class="form-control" require>
            <option value="">--SELECCIONE UNA OPCION--</option>
            <option value="1">SI/NO</option>
            <option value="2">Calificación por número</option>
          </select>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection