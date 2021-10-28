@extends('layouts.master')

@section('content')
    @if (Session::has('info'))
        <div class="row">
            <div class="col">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <h2>Posts</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['content'] }}</p>
                        <a href="{{ route('post.view', ['id' => array_search($post, $posts)]) }}"
                            class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
