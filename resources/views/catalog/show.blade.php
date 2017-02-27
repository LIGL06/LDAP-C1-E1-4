@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <div class="container">
                    <div class="row">
                      @foreach($catalog as $key => $value)
                      <div class="col-md-4">
                        <img src="" alt="">
                      </div>
                      <div class="col-md-8">
                        <h5>{{$value}}</h5>
                      </div>
                      @endforeach
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
