<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Catalog;
use App\Movie;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $arrayPeliculas = Movie::all();
        return view('catalog.index')->with('arrayPeliculas',$arrayPeliculas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'title' => 'required',
        'year' => 'required|numeric',
        'director' => 'required',
        'synopsis' => 'required',
        'poster' => 'required',
        'rented' => 'required'
      ]);
      if ($validator->fails()){
          return redirect()->action('CatalogController@getCreate')->withErrors($validator)->withInput();
        } else {
          $movie = new Movie;
          $movie->title = Input::get('title');
          $movie->year = Input::get('year');
          $movie->director = Input::get('director');
          $movie->synopsis = Input::get('synopsis');
          $movie->poster = Input::get('poster');
          $movie->rented = Input::get('rented');
          $movie->save();
          $request->session()->flash('message', $movie->title.' ha sido añadida');
          return redirect()->action('CatalogController@getIndex');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $catalog = Movie::find($id);
        // return $catalog;
        return view('catalog.show')->with('catalog',$catalog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $movie = Movie::find($id);
        // return $movie;
        return view('catalog.edit')->with('movie',$movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
          'title' => 'required',
          'year' => 'required|numeric',
          'director' => 'required',
          'synopsis' => 'required',
          'poster' => 'required',
          'rented' => 'required'
        ]);
        if ($validator->fails()){
            return redirect()->action('CatalogController@getEdit',$id)->withErrors($validator)->withInput();
          } else {
            $movie = Movie::find($id);
            $movie->title = Input::get('title');
            $movie->year = Input::get('year');
            $movie->director = Input::get('director');
            $movie->synopsis = Input::get('synopsis');
            $movie->poster = Input::get('poster');
            $movie->rented = Input::get('rented');
            $movie->save();
            $request->session()->flash('message', $movie->title.' ha sido actualizada');
            return redirect()->action('CatalogController@getIndex');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMovie(Request $request, $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        $request->session()->flash('message', $movie->title.' ha sido eliminada');
        return redirect()->action('CatalogController@getIndex');
    }

    public function putRent(Request $request, $id){
      $movie = Movie::find($id);
      $movie->rented= !$movie->rented;
      $movie->save();
      $request->session()->flash('message', $movie->title.' ha sido actualizada');
      return redirect()->action('CatalogController@getIndex');
    }
}
