
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method = "POST" action="{{route('posts.update', $post->id)}}">
{{--                            dont forget csrf for post data--}}
                            @csrf
{{--                            changes post to PUT for edit--}}
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name = "title" value="{{old('title') ??$post->title}}" placeholder="Enter Post Title">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contents" class="form-label">Contents</label>
                                <input type="text" class="form-control" id="contents" name ="contents" value="{{old('contents') ?? $post->contents}}" placeholder="Enter Contents">
                            </div>
                            @error('contents')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button class = "btn btn-primary" type = "submit" >Submit</button>
                            <a class="btn btn-outline-danger" href="{{route('posts.index')}}">Cancel</a>
                        </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
