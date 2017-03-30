@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Vas a crear <b>una película</b></div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-12 col-md-12">
                        {!! Html::ul($errors->all()) !!}
                        <form action="{{action('CatalogController@store')}}" method="post" style="display:inline">
                          {{ method_field('POST') }}
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label for="title">Titulo de la película</label>
                            <input type="text" name="title" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="year">Año de la película</label>
                            <input type="number" name="year" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="poster">Director de la película</label>
                            <input type="text" name="director" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="synopsis">Synopsis de la película</label>
                            <input name="synopsis" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="poster">Link poster de la película</label>
                            <input type="text" name="poster" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="rented">Estado de la película</label>
                            <select class="form-control" name="rented">
                              <option value="0">Dispobible</option>
                              <option value="1">Rentada</option>
                            </select>
                          </div>
                          <div class="row col-md-offset-10 col-xs-offset-10">
                            <input type="submit" class="btn btn-success" value="Guardar">
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
