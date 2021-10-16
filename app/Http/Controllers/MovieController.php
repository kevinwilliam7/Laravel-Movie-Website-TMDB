<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MovieController extends Controller
{
    protected $token = '7ed06baecedb35023e1e5d3151ec5ae2';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currentPage = $request->page;
        $popularMovies = Http::
            get('https://api.themoviedb.org/3/movie/popular?api_key='.$this->token.'&page='.$currentPage)
            ->json()['results'];
        $popularCounts = Http::
            get('https://api.themoviedb.org/3/movie/popular?api_key='.$this->token)
            ->json()['total_results'];
        $upcomingMovies = Http::
            get('https://api.themoviedb.org/3/movie/upcoming?api_key='.$this->token)
            ->json()['results'];
        $topratedMovies = Http::
            get('https://api.themoviedb.org/3/movie/top_rated?api_key='.$this->token)
            ->json()['results'];
        return view('pages/homescreen',[
            'popularMovies'=>$popularMovies,
            'popularCounts'=>$popularCounts,
            'upcomingMovies'=>$upcomingMovies,
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
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key='.$this->token.'&append_to_response=credits')->json();
        $downloads = Download::with('cloud_storage')->where('id',$id)->get();
        $casts = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key='.$this->token.'&append_to_response=credits')->json()['credits']??'Test';
        $similars = Http::get('https://api.themoviedb.org/3/movie/'.$id.'/similar?api_key='.$this->token)->json()['results'];
        return view('pages/detailscreen',[
            'movie'=>$movie,
            'downloads'=>$downloads,
            'casts'=>$casts,
            'similars'=>$similars,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
