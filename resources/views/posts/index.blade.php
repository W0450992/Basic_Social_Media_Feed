@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-primary d-grid gap-6" href="{{route('posts.create')}}">Create New Post</a>

                        <div>

                            @foreach($users as $user)
                                @foreach($posts as $post)

                                    @if($post->created_by == $user->id)
                                    <div class = "card">
                                        <div class = "card-body">{{"Posted " . $post->created_at . " by " . $user->name}}</div>
                                        <div class = "card-body"><h4>{{$post->contents . "\n"}}</h4></p>
                                        <div >{{$post->title . "\n"}}</div>
                                        <div><a class="btn btn-warning btn-group"  href="{{route('posts.edit', $post->id)}}">Edit</a></div>
                                        <form method ="POST" action="{{route('posts.destroy', $post->id) }}" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger btn-group" >Delete</button>
                                        </form>
                                    </div>
                                    @endif
                                    @endforeach
                                        @endforeach


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
