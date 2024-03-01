@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 my-4">
                <h2 class="text-center">Edit Project</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="p-4">
                        <div class="mb-3">
                            @if($project->img != null)
                                @if (Str::contains($project->img, 'https'))
                                    <div class="my-3 d-flex justify-content-center" >
                                        <img src="{{$project['img']}}" class="card-img-top my-3" style="width: 300px" >
                                    </div>
                                @else
                                    <div class="my-3 d-flex justify-content-center" >
                                        <img src="{{ asset('/storage/' . $project->img) }}" class="card-img-top my-3" style="width: 300px">
                                    </div>
                                @endif      
                            @else
                                <div class="my-3 d-flex justify-content-center">
                                    <img src="https://secureservercdn.net/166.62.110.60/h65.3a1.myftpupload.com/wp-content/uploads/2021/09/variable-placeholder-product-31.jpg?time=1644500349" alt="{{ $project->name }}" class="rounded" >
                                </div>
                            @endif
                            <label for="img" class="form-label">Image</label>
                            <input class="form-control @error('img') is invalid @enderror" type="file" name="img" id="img" value="{{ old('img') }}" accept="image/*">
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Project name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Project name..." value="{{ old('name') ?? $project->name }}" >
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if ($error_message != null)
                                <div class="form-text text-danger">{{$error_message}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="typeProject" class="form-label">Select project type</label>
                            <select name="type_id" class="form-select @error('type_id') is-invalid border-danger @enderror" id="type_id" placeholder="Type..." id="typeProject">

                                <option value="{{old('type_id')}}" selected>Select type...</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}" @selected($type->id == old('type_id', $project->type ? $project->type->id : ''))>{{$type->name}}</option>  
                                @endforeach

                            </select>
                            @error('type_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project Technology</label>
                            <div>
                                @foreach ($technologies as $technology)
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="technologies[]" id="tech-{{$technology->id}}" value="{{$technology->id}}" {{$project->technologies->contains($technology->id) ? 'checked' : ''}}>
                                        <label for="" class="form-check-label ms-1 badge rounded-pill text-black">{{$technology->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Description..." >{{ old('description') ?? $project->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="repository_link" class="form-label">Repository link</label>
                            <input type="text" name="repository_link" class="form-control" id="repository_link" placeholder="Repository link..." value="{{ old('repository_link') ?? $project->repository_link }}" >
                            @error('repository_link')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date_start" class="form-label">Start date</label>
                            <input class="form-control" type="date" name="date_start" id="date_start" value="{{ old('date_start') ?? $project->date_start }}" >
                            @error('date_start')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date_end" class="form-label">End date</label>
                            <input class="form-control" type="date" name="date_end" id="date_end" value="{{ old('date_end') ?? $project->date_end }}">
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Go Back</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
