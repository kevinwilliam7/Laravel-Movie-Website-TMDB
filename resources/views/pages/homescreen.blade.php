<!-- TODO: Homepage -->
@extends('layout/main')
@section('title','Movie Site')
@section('section')
    <div class ="relative inline-block sm:mr-0 sm:ml-0 p-0 md:m-0 p-0 lg:ml-0 lg:mr-0 p-8 bg-white dark:bg-gray-900">
        @include('utils/popularMovies')
    </div>
@endsection