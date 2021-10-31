<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Post;

class PostsController extends Controller
{
    public function getIndex(Store $session)
    {
        $post = new Post();
        $posts = $post->getPosts($session);
        return view('blog.index', ['posts' => $posts]);
    }

    public function getPost(Store $session, $id)
    {
        $post = new Post();
        return view('blog.post', ['post' => $post->getPost($session, $id), 'postId' => $id]);
    }

    public function getCreatePost()
    {
        return view('blog.create');
    }

    public function postUpsertPost(Store $session, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = new Post();
        $post->upsertPost($session, $request->input('title'), $request->input('content'), $request->input('id'));
        return redirect()->route('blog.index')->with('info', 'Operation completed successfully.');
    }
}
