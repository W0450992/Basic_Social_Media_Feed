
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new Theme') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method = "POST" action="{{route('themes.store')}}">
{{--                            dont forget csrf for post data--}}
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name = "name" value="{{old('name')}}" placeholder="Enter Theme Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cdn_url" class="form-label">CDN URL</label>
                                <input type="text" class="form-control" id="cdn_url" name = "cdn_url" value="{{old('cdn_url')}}" placeholder="Enter CDN URL">
                                @error('cdn_url')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class="mb-3">--}}
{{--                                <label for="password" class="form-label">Password</label>--}}
{{--                                <input type="text" class="form-control" id="password" name = "password" value="" placeholder="Enter Password">--}}
{{--                                @error('password')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class = "mb-3">--}}
{{--                                <label for="role_id" class="form-label">Country</label>--}}
{{--                                <select class="form-select" name="role_id" id="role_id">--}}
{{--                                    @foreach($roles as $role)--}}
{{--                                        <option value="{{$roles->id}}">{{$role->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <button class = "btn btn-primary" type = "submit" >Submit</button>
                            <a class="btn btn-outline-danger" href="{{route('themes.index')}}">Cancel</a>
                        </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
