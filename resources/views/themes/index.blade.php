@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Themes List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-primary d-grid gap-6" href="{{route('themes.create')}}">Create New Theme</a>

                        <table class="table">
                            <thead>

                            <tr>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Last Updated By</th>
                                <th colspan = "3">Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($themes as $theme)
                                <tr>
                                    <td>{{$theme->name}}</td>
                                    <td>{{$theme->createdBy->name}}</td>
{{--                                    <td>{{$user->roles->first()->name}}</td>--}}
                                    <td>
                                       {{$theme->updatedBy ? $theme->updatedBy->name : ''}}</td>

                                    <td>
                                        <a class="btn btn-success btn-group"  href="{{route('themes.show', $theme->id)}}">Details</a>
                                    </td>
                                    <td>
                                        @if($theme->id != 1)
                                        <a class="btn btn-warning btn-group"  href="{{route('themes.edit', $theme->id)}}">Edit</a>
                                        @endif
                                    </td>

                                    <td>
                                        @if($theme->id != 1)
                                        <form method ="POST" action="{{route('themes.destroy', $theme->id) }}" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger btn-group" >Delete</button>
                                            @endif
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
