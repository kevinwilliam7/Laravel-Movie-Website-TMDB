<div class="grid grid-cols-2 py-5">
    <div class="flex justify-start border-l-8 pl-4 border-purple-500 dark:border-blue-500">
        <a class="tracking-widest font-bold text-lg text-black dark:text-white">Popular Movies </a>
    </div>
    <div class="flex justify-end">
        <a class="text-gray-500 text-lg font-bold">{{$popularCounts}} <button class="text-white text-xs bg-purple-500 dark:bg-blue-500 py-1 px-2 rounded focus:ring-2 focus:ring-white hover:bg-purple-700 dark:hover:bg-blue-700">See All</button></a>
    </div>
</div>
<div class="grid gap-2 grid-cols-3 sm:grid-cols-3 sm:gap-5 md:grid-cols-4 md:gap-10 lg:grid-cols-5 lg:gap-10">
    @foreach($popularMovies as $popularMovie)
    <div class="lg:w-auto h-auto">
        <div class="relative">
            <div class="z-20 absolute bg-red-700 rounded m-2 sm:w-auto md:w-28 lg:w-28"><p class="text-white text-center text-xs sm:text-sm md:text-sm lg:text-sm font-bold">Bluray 720P</p></div>
            <img class="opacity-100 hover:opacity-25 duration-300 rounded-lg" src="https://image.tmdb.org/t/p/original/{{$popularMovie['poster_path']}}">
            <a href="{{route('detail',$popularMovie['id'])}}" class="opacity-0 hover:opacity-100 bg-opacity-70 duration-300 bg-black absolute inset-0 z-10 flex justify-center items-center text-6xl text-white font-semibold rounded-lg">
                <i class="fas fa-play"></i>
                <div class="z-30 bg-transparent absolute bottom-0 right-0 m-2"><p class="text-white text-center text-sm font-bold"><i class="fas fa-star"></i> {{$popularMovie['vote_average']}}/10</p></div>
            </a>
        </div>
        <div class="pb-4 mt-4 border-left border-blue-600">
            <p class="truncate font-semibold text-black dark:text-white dark:tracking-widest"><a href="{{route('detail',$popularMovie['id'])}}" class="hover:text-blue-900 dark:hover:text-blue-400">{{$popularMovie['title'].' ('.Carbon\Carbon::parse($popularMovie['release_date'])->format('Y').')'}}</a></p>
            <a class="tracking-widest text-gray-700 dark:text-gray-400 font-bold text-xs">{{Carbon\Carbon::parse($popularMovie['release_date'])->format('M d, Y')}}</a>
        </div>
    </div>
    @endforeach
</div>
{{-- <form method="GET" class="flex items-center space-x-1">
    <button name="previous" value="" type="text" class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" /></svg></button>
    <button name="page" value="1" type="text" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">1</button>
    <button name="page" value="2" type="text" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">2</button>
    <button name="page" value="3" type="text" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">3</button>
    <button name="next" value="" type="text" class="px-4 py-2 text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg></button>
</form> --}}