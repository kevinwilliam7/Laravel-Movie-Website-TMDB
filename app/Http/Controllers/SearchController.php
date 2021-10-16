<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    protected $token = '7ed06baecedb35023e1e5d3151ec5ae2';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request){
    //     //https://api.themoviedb.org/3/discover/movie?api_key=THE_KEY&language=en-US&sort_by=popularity.desc&page=1&primary_release_year=2020&with_original_language=hi|kn|ml|ta|te  
    //     $countries = Http::
    //         get('https://api.themoviedb.org/3/configuration/countries?api_key='.$this->token)
    //         ->json()['genres'];
    //     $genres = Http::
    //         get('https://api.themoviedb.org/3/genre/movie/list?api_key='.$this->token)
    //         ->json()['genres'];
    //     return view('pages/searchscreen',[
    //         'genres'=>$genres,
    //         'countries'=>$countries,
    //     ]);
    // }

    public function search_by_query(Request $request)
    {
        $query = $request->search;
        $results = Http::
            get('https://api.themoviedb.org/3/search/movie?api_key='.$this->token.'&append_to_response=credits&query='.$query)
            ->json()['results'];
        return view('pages/resultscreen',[
            'results'=>$results,
            'query'=>$query,
            'genres'=>null,
        ]);
    }

    public function search_by_genre($id)
    {
        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key='.$this->token)->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function($genre){
            return [$genre['id'] => $genre['name']];
        });
        $results = Http::
            get('https://api.themoviedb.org/3/discover/movie?api_key='.$this->token.'&sort_by=popularity.desc&with_genres='.$id)
            ->json()['results'];
        return view('pages/resultscreen',[
            'results'=>$results,
            'query'=>$genres,
            'id'=>$id,
            'genres'=>$genres,
        ]);
    }

    public function search_by_country($id)
    {
        $results = Http::
            get('https://api.themoviedb.org/3/discover/movie?api_key='.$this->token.'&with_original_language='.$id)
            ->json()['results'];
        return view('pages/resultscreen',[
            'results'=>$results,
            'query'=>'',
            'genres'=>null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
