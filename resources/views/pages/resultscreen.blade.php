@extends('layout/main')
@section('title','MovieSite')
@section('section')
<div class ="relative inline-block bg-white dark:bg-gray-900 sm:mr-0 sm:ml-0 p-0 md:m-0 p-0 lg:ml-0 lg:mr-0 p-8">
    <div class="grid grid-cols-2 py-5">
        <div class="flex justify-start border-l-8 pl-4 border-purple-500 dark:border-blue-500">
            <a class="tracking-widest font-bold text-lg text-black dark:text-white">@if($genres!=null) Genre {{$genres->get($id)}} @elseif($genres==null) Search Results @endif</a>
        </div>
    </div>
    <div class="grid gap-2 grid-cols-3 sm:grid-cols-3 sm:gap-5 md:grid-cols-4 md:gap-10 lg:grid-cols-5 lg:gap-10">
        @foreach($results as $result)
        <div class="lg:w-auto h-auto">
            <div class="relative">
                <div class="z-20 absolute bg-red-700 rounded m-2 sm:w-auto md:w-28 lg:w-28"><p class="text-white text-center text-xs sm:text-sm md:text-sm lg:text-sm font-bold">Bluray 720P</p></div>
                <img class="opacity-100 hover:opacity-25 duration-300 rounded-lg" src="https://image.tmdb.org/t/p/original/{{$result['poster_path']}}">
                <a href="{{route('detail',$result['id'])}}" class="opacity-0 hover:opacity-100 bg-opacity-70 duration-300 bg-black absolute inset-0 z-10 flex justify-center items-center text-6xl text-white font-semibold rounded-lg">
                    <i class="fas fa-play"></i>
                    <div class="z-30 bg-transparent absolute bottom-0 right-0 m-2"><p class="text-white text-center text-sm font-bold"><i class="fas fa-star"></i> {{$result['vote_average']}}/10</p></div>
                </a>
            </div>
            <div class="pb-4 mt-4 border-left border-blue-600">
                <p class="truncate tracking-widest font-semibold text-black dark:text-white"><a href="{{route('detail',$result['id'])}}" class="hover:text-blue-400">{{$result['title']}}</a></p>
                <a class="tracking-widest text-gray-700 dark:text-gray-400 font-bold text-xs">{{Carbon\Carbon::parse($result['release_date'])->format('M d, Y')}}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection