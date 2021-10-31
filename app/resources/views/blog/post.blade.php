@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit a Post</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <form action="{{ route('post.upsert') }}" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Title of the Post</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Post name"
                        @isset($post)
                            value="{{ $post['title'] }}"
                        @endisset>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <div class="row">
                        <div class="col">
                            <textarea id="content" name="content" rows="4" cols="50">
                                @isset($post)
                                    {{ $post['content'] }}
                                @endisset
                            </textarea>
                        </div>
                    </div>
                </div>
                @isset($postId)
                    <input type="hidden" value="{{ $postId }}" name="id">
                @endisset
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection