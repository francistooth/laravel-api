@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Crea nuovo progetto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <input value="{{ $project->title }}" class="form-control mb-4" type="text" name="title" id="">
            <input class="form-control mb-4" type="file" name="path_image" id="">
            <textarea class="form-control mb-4" name="text" id="" cols="30" rows="10">{{ $project->text }}</textarea>

            <input class="btn btn-primary text-light" type="submit" value="Crea">
        </form>
    </div>
@endsection
