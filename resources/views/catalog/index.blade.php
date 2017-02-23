@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                  @foreach($pelicula as $key => $value)
                  <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <a href="{{ url('/catalog/show/' . $key ) }}">
                      <img src="{{$pelicula['poster']}}" style="height:200px"/>
                      <h4 style="min-height:45px;margin:5px 0 10px 0">
                        {{$pelicula['title']}}
                      </h4>
                    </a>
                  </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
