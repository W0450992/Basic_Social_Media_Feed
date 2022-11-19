@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-primary d-grid gap-6" href="{{route('users.create')}}">Create New Admin User</a>

                        <table class="table">
                            <thead>

                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th colspan = "3">Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
{{--                                    <td>{{$user->roles->first()->name}}</td>--}}
                                    <td>
                                        <ul>
                                            @foreach($user->roles as $role)
                                                <li>{{$role->name}}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td>
                                        <a class="btn btn-success btn-group"  href="{{route('users.show', $user->id)}}">Show</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-group"  href="{{route('users.edit', $user->id)}}">Edit</a>
                                    </td>
                                    <td>
                                        <form method ="POST" action="{{route('users.destroy', $user->id) }}" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger btn-group" >Delete</button>
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
