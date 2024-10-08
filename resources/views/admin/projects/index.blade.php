@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-between align-items-center mt-4">
        <h2> Progetti </h2>

        <a class="btn btn-danger" href="{{route('projects.create')}}"> <i class="fa-solid fa-plus">  </i></a>
    </div>


    <div class="container">
        <ul class="row gap-3 row-cols-1 row-cols-md-4 justify-content-center">
            @foreach ($projects as $project)
                <li class="mt-3 card p-4 position-relative">
                    <a class="stretched-link z-1" href="{{ route('projects.show', $project) }}"></a>
                    <img class="card-img-top w-100" src="{{ asset('storage/' . $project->path_image) }}" alt="">
                    <div class="card-body w-100 position-relative">
                        <p class="mt-3">
                            {{ $project->title }}
                        </p>
                        <p class="mt-3">
                            {{ $project->text }}
                        </p>

                        <a  class="btn btn-primary rounded border-0 w-25 position-relative z-3" href="{{route('projects.edit', $project)}}"> <i class="fa-solid fa-pen">  </i></a>
                        <!-- <a class="btn btn-danger  rounded border-0 w-25 position-relative z-3" href="{{route('projects.delete', $project)}}"> <i class="fa-solid fa-trash">  </i></a> -->
                         <form action="{{route('projects.delete', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded border-0 w-25 position-relative z-3" href=""> <i class="fa-solid fa-trash">  </i></button>
                         </form>
                    </div>
                </li>
                @empty($projects)
                <li> No projects found. </li>
                @endempty
            @endforeach
        </ul>
    </div>
@endsection
