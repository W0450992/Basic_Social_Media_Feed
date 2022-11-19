
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method = "POST" action="{{route('users.store')}}">
{{--                            dont forget csrf for post data--}}
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name = "name" value="{{old('name')}}" placeholder="Enter Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name = "email" value="{{old('email')}}" placeholder="Enter Email">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name = "password" value="" placeholder="Enter Password">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class = "mb-3">--}}
{{--                                <label for="role_id" class="form-label">Country</label>--}}
{{--                                <select class="form-select" name="role_id" id="role_id">--}}
{{--                                    @foreach($roles as $role)--}}
{{--                                        <option value="{{$roles->id}}">{{$role->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class = "mb-3">
                                <label for="roles" class="form-label">Roles</label>
                                    @foreach($roles as $role)
                                        <div class="form-check">
                                            <input class="form-check-input" name="role_ids[]" type="checkbox" value="{{$role->id}}" id="role-{{$role->id}}">
                                            <label class="form-check-label" for="role-{{$role->id}}">
                                                {{$role->name}}
                                            </label>
                                        </div>
                                    @endforeach

                            </div>
                            <button class = "btn btn-primary" type = "submit" >Submit</button>
                            <a class="btn btn-outline-danger" href="{{route('users.index')}}">Cancel</a>
                        </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
