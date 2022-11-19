
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method = "POST" action="{{route('users.update', $user->id)}}">
{{--                            dont forget csrf for post data--}}
                            @csrf
{{--                            changes post to PUT for edit--}}
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name = "name" value="{{old('name') ??$user->name}}"placeholder="Enter User Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name ="email" value="{{old('email') ?? $user->email}}" placeholder="Enter Email">
                            </div>
                            @error('flag_img_url')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button class = "btn btn-primary" type = "submit" >Submit</button>
                            <a class="btn btn-outline-danger" href="{{route('users.index')}}">Cancel</a>
                        </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
