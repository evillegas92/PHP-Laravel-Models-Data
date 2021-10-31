@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Create a Post</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <form action="{{ route('post.upsert') }}" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Name of the Post</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Post name">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <div class="row">
                        <div class="col">
                            <textarea id="content" name="content" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
