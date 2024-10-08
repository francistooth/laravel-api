@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-5 rounded-5 bg-light p-4 shadow">

        <img class="card-img-top w-100" src="{{ asset('/storage/' . $project->path_image) }}" alt="">

        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->text }}</p>
        </div>

    </div>

@endsection
