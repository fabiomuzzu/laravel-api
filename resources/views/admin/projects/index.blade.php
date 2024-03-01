@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center my-4">My Projects</h1>
            </div>
            <div class="col-12 my-3">
                <button type="button" class="btn btn-primary float-end me-3 "><a class="text-decoration-none text-white" href="{{route('admin.projects.create')}}">Add Project</a></button>
            </div>
            @foreach ($projects as $project)
                <div class="col-3 my-3 ">
                    <div class="card" style="width: 18rem;">
                        @if ($project->img !== null)
                            @if (Str::contains($project->img, 'https'))
                                <img src="{{$project['img']}}" class="card-img-top">
                            @else
                                <img src="{{ asset('/storage/' . $project->img) }}" class="card-img-top">
                            @endif                         
                        @else
                            <img src="https://secureservercdn.net/166.62.110.60/h65.3a1.myftpupload.com/wp-content/uploads/2021/09/variable-placeholder-product-31.jpg?time=1644500349" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$project['name']}}</h5>
                            <p class="card-text">{{ $project->type ? $project->type->name : 'Without type' }}</p>
                            @forelse ($project->technologies as $technology)
                                <div>
                                    <span>#{{$technology->name}}</span>
                                </div>
                            @empty
                                <div>
                                    <span>There are no technologies</span>
                                </div>
                            @endforelse
                            <a class="card-text" href="{{$project['repository_link']}}">Repository link</a>
                            <p class="card-text">{{$project['description']}}</p>
                            <p class="card-text">{{$project['date_start']}}</p>
                            <p class="card-text">{{$project['date_end']}}</p>
                            <div class="col-12 d-flex justify-content-center py-3">
                                <a href="{{route('admin.projects.show', ['project'=>$project->slug])}}" class="btn btn-primary">Details</a>
                                <a href="{{route('admin.projects.edit', ['project'=>$project->slug])}}" class="btn btn-warning text-white mx-4">Edit</a>
                                <button class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#modal_project_delete">DELETE</button>

                                @include('admin.projects.partials.modal_delete')
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection