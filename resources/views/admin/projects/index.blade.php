@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-between align-items-center mt-4">
        <h2> Progetti </h2>

        <a class="btn btn-danger" href="{{route('projects.create')}}"> <i class="fa-solid fa-plus">  </i></a>
    </div>


    <div class="container">
        <ul class="row gap-3 row-cols-1 row-cols-md-4 justify-content-center">
            @foreach ($projects as $project)
                <li class="mt-3 card p-4">
                    {{ $project->title}}
                </li>
                @empty($projects)
                <li> No projects found. </li>
                @endempty
            @endforeach
        </ul>
    </div>
@endsection
