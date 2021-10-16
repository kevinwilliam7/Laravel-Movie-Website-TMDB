<div class="py-5">
    <div class="flex justify-start border-purple-500 dark:border-blue-500 border-l-8 pl-4">
        <a class="tracking-widest text-black dark:text-white font-bold text-lg"> Similar Movies </a>
    </div>
</div>
<div class="flex flex-col">
    <div class="flex overflow-x-scroll h-40 sm:h-44 md:h-52 lg:h-80">
        @foreach($similars as $similar)
        <div class="px-4">
            <div class="relative w-24 h-10 md:w-32 md:h-20 lg:w-48 lg:h-24">
                <div class="z-20 absolute bg-red-700 rounded m-2 sm:w-auto md:w-28 lg:w-28"><p class="text-white text-center text-xs sm:text-sm md:text-sm lg:text-sm font-bold">Bluray 720P</p></div>
                <img class="opacity-100 duration-300 rounded-lg" src="https://image.tmdb.org/t/p/original/{{$similar['poster_path']}}">
                <a href="{{route('detail',$similar['id'])}}" class="opacity-0 hover:opacity-100 bg-opacity-70 duration-300 bg-black absolute inset-0 z-10 flex justify-center items-center text-6xl text-white font-semibold rounded-lg h-36 sm:h-48 md:h-48 lg:h-72">
                    <i class="fas fa-play"></i>
                    <div class="z-30 bg-transparent absolute bottom-0 right-0 m-2"><p class="text-white text-center text-sm font-bold"><i class="fas fa-star"></i> {{$similar['vote_average']}}/10</p></div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
