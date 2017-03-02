@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$catalog->title}}</div>
                <div class="panel-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-4 col-md-4">
                        <img src="{{$catalog['poster']}}" class="img-responsive">
                      </div>
                      <div class="col-xs-8 col-md-8">
                        <h3><b>{{$catalog->title}}</b></h3>
                        <h4><b>Año: </b>{{$catalog->year}}</h4>
                        <h5><b>Director: </b>{{$catalog->director}}</h5>
                        <small><b>Resumen:</b>{{$catalog->synopsis}}</small>
                        <br>
                        <small><b>Estado:</b>
                          @if($catalog->rented)
                            Película actualmente alquilada.
                          @else
                            Película disponible
                          @endif
                        </small>
                      </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-danger">Devolver película</button>
                        <button type="button" class="btn btn-warning">Editar película</button>
                        <button type="button" class="btn btn-default">Volver al listado</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
