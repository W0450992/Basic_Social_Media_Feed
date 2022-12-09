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

        {{dd($posts)}}
                                @foreach($posts as $post)

                                    @if($post->created_by == $user->id)
                                    <div class = "card">
                                        <div class = "card-header">{{"Posted " . $post->created_at->diffForHumans() . " by " . $user->name}}</div>
                                        <div class = "card-body"><h4>{{$post->contents . "\n"}}</h4></p>
                                        <div >{{$post->title . "\n"}}</div>
                                            @if($auth != null)
                                        @if( $auth->id == $user->id)
                                            <div class = "card-body"><a class="btn btn-warning btn-group"  href="{{route('posts.edit', $post->id)}}">Edit</a></div>
                                            @endif
                                            @if($auth->id == 2 || $auth->id == $post->created_by)
                                        <form method ="POST" action="{{route('posts.destroy', $post->id) }}" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger btn-group" >Delete</button>
                                        </form>
                                            @endif
                                                @endif
                                    </div>
                                    @endif
                                    @endforeach


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
