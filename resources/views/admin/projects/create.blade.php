@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 my-4">
                <h2 class="text-center">Add a New Project</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                            <label for="img" class="form-label">Image</label>
                            <input class="form-control @error('img') is invalid @enderror" type="file" name="img" id="img" value="{{ old('img') }}" accept="image/*">
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Project name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Project name..." value="{{ old('name') }}" >
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="typeProject" class="form-label">Select project type</label>
                            <select name="type_id" class="form-select @error('type_id') is-invalid border-danger @enderror" id="type_id" placeholder="Type..." id="typeProject">

                                <option value="{{old('type_id')}}" selected>Select type...</option>
                                @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>  
                                @endforeach

                            </select>
                            @error('type_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tag_id" class="form-label">Select tags:</label>
                            @foreach ($technologies as $technology)
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="technologies[]" id="tech-{{$technology->id}}" value="{{$technology->id}}" @checked(is_array(old(('technologies'))) && in_array($technology->id, old('technologies'))) >
                                    <label for="" class="form-check-label ms-1 badge rounded-pill text-black">{{$technology->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Description..." >{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="repository_link" class="form-label">Repository link</label>
                            <input type="text" name="repository_link" class="form-control" id="repository_link" placeholder="Repository link..." value="{{ old('repository_link') }}" >
                            @error('repository_link')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date_start" class="form-label">Start date</label>
                            <input class="form-control" type="date" name="date_start" id="date_start" value="{{ old('date_start') }}" >
                            @error('date_start')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date_end" class="form-label">End date</label>
                            <input class="form-control" type="date" name="date_end" id="date_end" value="{{ old('date_end') }}" >
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Aggiungi</button>
                            <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Go Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
