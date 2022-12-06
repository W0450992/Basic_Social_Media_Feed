

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Theme Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <h5>Name: {{$theme->name}}</h5>
                        <h5>CDN URL: <a href = "{{$theme->cdn_url}}" target = "new">{{$theme->cdn_url}}</a></h5>
                        <h5>Last Updated By: {{$theme->updatedBy ? $theme->updatedBy->name : ''}}</h5>
                        <h5>Created By: {{$theme->createdBy->name}}</h5>


                        <a class="btn btn-outline-danger" href="{{route('users.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
