

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <h5>ID: {{$userFound->id}}</h5>
                        <h5>Name: {{$userFound->name}}</h5>
                        <h5>Email: {{$userFound->email}}</h5>
                        <h5>Hashed Password: {{$userFound->password}}</h5>


                        <a class="btn btn-outline-danger" href="{{route('users.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
