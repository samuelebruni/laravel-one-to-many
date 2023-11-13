@extends('layouts.admin')

@section('content')

<div class="container mt-5">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">

    @csrf
        <div class="mb-4">
            <label for="title" class="form-label">TITLE ✍</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Type title project here...">
            <small id="titleHelper" class="form-text text-muted">Type the title here</small>
            @error('title')
                <div class="text-danger"> {{$message}} </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">DESCRIPTION ✍</label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpDescription" placeholder="Type description project here...">
            <small id="descriptionHelper" class="form-text text-muted">Type the description here</small>
            @error('description')
                <div class="text-danger"> {{$message}} </div>
            @enderror

        </div>

        <div class="mb-4">

                <label for="type_id" class="form-label">Types </label>
                <select class="form-select @error('type_id') is-invalid  @enderror" name="type_id" id="type_id">
                    <option selected disabled>Select Types 👇</option>
                    <option value="">Uncategorized</option>
                    @forelse ($types as $type)
                    <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{$type->name}}</option>
                    @empty

                    @endforelse

                </select>

        </div>

        <div class="mb-4">
            <label for="project_link" class="form-label">
                GITHUB LINK 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                </svg>
            </label>
            <input type="text" class="form-control" name="project_link" id="project_link" aria-describedby="help_project_link" placeholder="Type GitHub link project here...">
            <small id="project_linkHelper" class="form-text text-muted">Type the GitHub link here</small>
            @error('project_link')
                <div class="text-danger"> {{$message}} </div>
            @enderror

        </div>

        <div class="mb-4">
            <label for="online_link" class="form-label">
                PAGE LINK 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                </svg>
            </label>
            <input type="text" class="form-control" name="online_link" id="online_link" aria-describedby="help_online_link" placeholder="Type external link project here...">
            <small id="online_linkHelper" class="form-text text-muted">Type the online link here</small>
            @error('online_link')
                <div class="text-danger"> {{$message}} </div>
            @enderror

        </div>

        <div class="d-flex gap-4">
            <div class="mb-4">
                <label for="cover_image" class="form-label">UPDATE NEW IMAGE 🚀</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="" aria-describedby="cover_image_helper">
                <div id="cover_image_helper" class="form-text">Upload a new image for the current project</div>
            </div>
        </div>


        <div>
            <a class="btn btn-success mt-3" href="{{route('admin.projects.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>
            <button type="submit" class="btn btn-primary mt-3">
                Create
            </button>
        </div>


    </form>    

</div>


@endsection