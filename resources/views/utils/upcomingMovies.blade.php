<div class="grid grid-cols-2 py-5">
    <div class="flex justify-start border-purple-500 border-l-8 pl-4">
        <a class="tracking-widest text-white font-bold text-lg">New Update</a>
    </div>
    <div class="flex justify-end">
        <a class="text-gray-500 text-lg font-bold">1,912 <button class="text-white text-xs bg-blue-500 py-1 px-2 rounded focus:ring-2 focus:ring-white hover:bg-blue-700">See All</button></a>
    </div>
</div>
<div class="grid gap-2 grid-cols-3 sm:grid-cols-3 sm:gap-5 md:grid-cols-4 md:gap-10 lg:grid-cols-5 lg:gap-10">
    @foreach($upcomingMovies as $upcomingMovie)
    <div class="lg:w-auto h-auto">
        <div class="relative">
            <div class="z-20 absolute bg-red-700 rounded m-2 sm:w-auto md:w-28 lg:w-28"><p class="text-white text-center text-xs sm:text-sm md:text-sm lg:text-sm font-bold">Bluray 720P</p></div>
            <img class="opacity-100 hover:opacity-25 duration-300 rounded-lg" src="https://image.tmdb.org/t/p/original/{{$upcomingMovie['poster_path']}}">
            <a href="{{route('detailscreen',$upcomingMovie['id'])}}" class="opacity-0 hover:opacity-100 bg-opacity-70 duration-300 bg-black absolute inset-0 z-10 flex justify-center items-center text-6xl text-white font-semibold rounded-lg">
                <i class="fas fa-play"></i>
                <div class="z-30 bg-transparent absolute bottom-0 right-0 m-2"><p class="text-white text-center text-sm font-bold"><i class="fas fa-star"></i> {{$upcomingMovie['vote_average']}}/10</p></div>
            </a>
        </div>
        <div class="pb-4 mt-4 border-left border-blue-600">
            <p class="truncate tracking-widest font-semibold text-white"><a href="{{route('detailscreen',$upcomingMovie['id'])}}" class="hover:text-blue-400">{{$upcomingMovie['title']}}</a></p>
            <a class="tracking-widest text-gray-400 font-bold text-xs">{{$upcomingMovie['release_date']}}</a>
        </div>
    </div>
    @endforeach
</div>