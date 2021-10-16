@extends('layout/main')
@section('title','Download '.$movie['title'].' Sub Indonesia')
@section('section')
@if($movie['backdrop_path']!=null)
    <div class="flex flex-col">
        <div class="relative h-32 sm:h-48 md:h-60 lg:h-96">
            <div class="bg-cover bg-center">
                <img class="opacity-50 rounded-b-3xl w-full" src="https://image.tmdb.org/t/p/original/{{$movie['backdrop_path']}}">
            </div>
        </div>
        <div class ="relative rounded-t-3xl p-8 w-full h-full border-t shadow-lg bg-white dark:bg-gray-900 dark:border-gray-900">
            <div class="w-full h-full">
                <div class="flex-none sm:flex md:flex lg:flex">
                    <img class="flex-2 mx-auto opacity-100 rounded-3xl w-48" src="https://image.tmdb.org/t/p/original/{{$movie['poster_path']}}">
                    <div class="flex-1 m-4">
                        <div><p class="font-semibold text-4xl text-black dark:text-white">{{$movie['title'].' ('.Carbon\Carbon::parse($movie['release_date'])->format('Y').')'}}</p></div>
                        <div><p class="mt-2 font-light text-black dark:text-white">{{$movie['tagline']}}</p></div>
                        <div><p class="mb-2 font-semibold text-sm text-black dark:text-white">{{Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</p></div>
                        <div class="mb-2 font-semibold text-sm text-black dark:text-white">
                            @if ($movie['vote_average']==0)
                                @for ($i = 0; $i < 5; $i++)<i class="fas fa-star"></i> @endfor
                            @elseif ($movie['vote_average']>0 && $movie['vote_average']<=2)
                                @for ($i = 0; $i < 1; $i++)<i class="fas fa-star text-red-400 dark:text-yellow-300"></i> @endfor
                                @for ($i = 0; $i < 4; $i++)<i class="fas fa-star text-gray-400 dark:text-white"></i> @endfor
                            @elseif($movie['vote_average']>2 && $movie['vote_average']<=4)
                                @for ($i = 0; $i < 2; $i++)<i class="fas fa-star text-red-400 dark:text-yellow-300"></i >@endfor
                                @for ($i = 0; $i < 3; $i++)<i class="fas fa-star text-gray-400 dark:text-white"></i> @endfor
                            @elseif($movie['vote_average']>4 && $movie['vote_average']<=7.5)
                                @for ($i = 0; $i < 3; $i++)<i class="fas fa-star text-red-400 dark:text-yellow-300"></i> @endfor
                                @for ($i = 0; $i < 2; $i++)<i class="fas fa-star text-gray-400 dark:text-white"></i> @endfor
                            @elseif($movie['vote_average']>7.5 && $movie['vote_average']<9.9)
                                @for ($i = 0; $i < 4; $i++)<i class="fas fa-star text-red-400 dark:text-yellow-300"></i> @endfor
                                @for ($i = 0; $i < 1; $i++)<i class="fas fa-star text-gray-400 dark:text-white"></i> @endfor
                            @else
                                @for ($i = 0; $i < 5; $i++)<i class="fas fa-star text-yellow-300"></i> @endfor
                            @endif
                            {{$movie['vote_average']}}
                        </div>
                        <div>
                            @foreach ($movie['production_companies'] as $company)
                            <a href="#" class="text-black dark:text-white">{{$company['name']}}@if($loop->last) @else, @endif</a>
                            @endforeach
                        </div>
                        <div class="py-6 overflow-auto">
                            @foreach($movie['genres'] as $genre)
                                <div class="inline-block text-blue-500 bg-transparent border border-solid border-blue-500 hover:bg-blue-500 hover:text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"><a href="/genre/{{$genre['id']}}">{{$genre['name']}}</a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr class="mt-4 mb-4">

                <div id="tabs" x-data="{ tab: 'download' }">
                    <ul class="flex flex-wrap cursor-pointer bg-gray-200 dark:bg-gray-800 py-4 rounded-lg space-x-2">
                        <li x-on:click="tab = 'download'" x-bind:class="{'active bg-purple-500 text-white dark:bg-gray-200 dark:text-gray-900' : tab == 'download', '' : tab != 'download' }" class="text-black hover:text-white hover:bg-purple-500 dark:text-white dark:hover:text-gray-900 block dark:hover:bg-gray-200 rounded focus:outline-none font-semibold py-2 px-4 lg:py-2 lg:px-4 ml-3"><a href="#tabs-0">Download</a></li>
                        <li x-on:click="tab = 'overview'" x-bind:class="{'active bg-purple-500 text-white dark:bg-gray-200 dark:text-gray-900' : tab == 'overview', '' : tab != 'overview' }" class="text-black hover:text-white hover:bg-purple-500 dark:text-white dark:hover:text-gray-900 block dark:hover:bg-gray-200 rounded focus:outline-none font-semibold py-2 px-2 lg:py-2 lg:px-4"><a href="#tabs-1">Overview</a></li>
                        <li x-on:click="tab = 'cast'" x-bind:class="{'active bg-purple-500 text-white dark:bg-gray-200 dark:text-gray-900' : tab == 'cast', '' : tab != 'cast' }" class="text-black hover:text-white hover:bg-purple-500 dark:text-white dark:hover:text-gray-900 block dark:hover:bg-gray-200 rounded focus:outline-none font-semibold py-2 px-4 lg:py-2 lg:px-4"><a href="#tabs-2">Cast</a></li>
                    </ul>
                    <div class="mt-6" id="tabs-0">
                        @include('dummy/download')
                    </div>
                    <div class="mt-4" id="tabs-1">
                        <p class="text-black dark:text-white">{{$movie['overview']}}</p>
                    </div>
                    <div class="mt-4 overflow-y-auto h-96" id="tabs-2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6">
                            @foreach ($casts['cast'] as $cast)
                                <div class="mt-2">
                                    <div class="rounded flex space-x-4 space-y-2">
                                        <div class=""><img src="https://image.tmdb.org/t/p/original/{{$cast['profile_path']}}" class="rounded-md h-24 w-16 sm:h-24 sm:w-8 md:h-18 md:w-8 lg:h-32 lg:w-24"></div>
                                        <div>
                                            <div><p class="text-black dark:text-white text-sm">{{$cast['name']}}</p></div>
                                            <div><p class="text-black dark:text-white text-xs">{{$cast['character']}}</p></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>           
                <hr class="mt-4 mb-4">
                @include('utils/similarMovies')
            </div> 
        </div>
    </div>
@else
    <img class="h-full w-full object-fit" src="https://wallpaperboat.com/wp-content/uploads/2020/12/03/62926/error-404-17.jpg">
@endif
<script>
    $( function() {
        $( "#tabs" ).tabs();
    } );
</script>
@endsection