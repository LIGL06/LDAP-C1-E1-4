@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Estás viendo información acerca de <b>{{$catalog->title}}</b></div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-4 col-md-4">
                        <img src="{{$catalog['poster']}}" class="img-responsive col-md-12" style="display:inline">
                      </div>
                      <div class="col-xs-8 col-md-8">
                        <h3><b>{{$catalog->title}}</b></h3>
                        <h4><b>Año: </b>{{$catalog->year}}</h4>
                        <h5><b>Director: </b>{{$catalog->director}}</h5>
                        <small><b>Resumen:</b>{{$catalog->synopsis}}</small>
                        <br>
                        <h5><b>Estado:</b>
                          @if($catalog->rented)
                            Película actualmente alquilada.
                          @else
                            Película disponible
                          @endif
                        </h5>
                        <div class="row ">
                          <br>
                              @if(Auth::user()->type)
                                <form action="{{action('CatalogController@getEdit', $catalog->id)}}" method="get" style="display:inline">
                                  {{ method_field('GET') }}
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-warning" style="display:inline">Editar película</button>
                                </form>
                              @else
                                @if($catalog->rented)
                                <form action="{{action('CatalogController@putRent', $catalog->id)}}" method="post" style="display:inline">
                                  {{ method_field('PUT') }}
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-danger" style="display:inline">Devolver película</button>
                                </form>
                                @else
                                <form action="{{action('CatalogController@putRent', $catalog->id)}}" method="post" style="display:inline">
                                  {{ method_field('PUT') }}
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-success" style="display:inline">Rentar película</button>
                                </form>
                                @endif
                              @endif
                            <form action="{{action('CatalogController@getIndex')}}" method="get" style="display:inline">
                              <button type="submit" class="btn btn-default" style="display:inline">Volver al listado</button>
                            </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
