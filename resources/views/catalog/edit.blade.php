@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Vas a editar a <b>{{$movie->title}}</b></div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-4 col-md-4">
                        <img src="{{$movie->poster}}" class="resposive-img">
                      </div>
                      <div class="col-xs-8 col-md-8">
                        {!! Html::ul($errors->all()) !!}
                        <form action="{{action('CatalogController@update', $movie->id)}}" method="post" style="display:inline">
                          {{ method_field('PUT') }}
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label for="title">Titulo de la película</label>
                            <input type="text" name="title" value="{{$movie->title}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="year">Año de la película</label>
                            <input type="number" name="year" value="{{$movie->year}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="poster">Director de la película</label>
                            <input type="text" name="director" value="{{$movie->director}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="synopsis">Synopsis de la película</label>
                            <input name="synopsis" value="{{$movie->synopsis}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="poster">Link poster de la película</label>
                            <input type="text" name="poster" value="{{$movie->poster}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="rented">Estado de la película</label>
                            <select class="form-control" name="rented">
                              <option value="0">Rentada</option>
                              <option value="1">Disponible</option>
                            </select>
                          </div>
                          <div class="row">
                            <input type="submit" class="btn btn-success" value="Actualizar">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
