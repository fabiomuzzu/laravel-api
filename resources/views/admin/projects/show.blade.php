@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-12 d-flex justify-content-center my-5 ">
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
                    </div>
                    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection