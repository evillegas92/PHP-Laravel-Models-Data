<?php 

namespace App;

class Post 
{
    const POSTS_SESSION_KEY = "posts";

    public function getPosts($session)
    {
        if (!$session->has(self::POSTS_SESSION_KEY))
        {
            $session->put(self::POSTS_SESSION_KEY, $this->createDummyData());
        }
        return $session->get(self::POSTS_SESSION_KEY);
    }

    public function getPost($session, $id)
    {
        if (!$session->has(self::POSTS_SESSION_KEY))
        {
            $session->put(self::POSTS_SESSION_KEY, $this->createDummyData());
        }
        return $session->get(self::POSTS_SESSION_KEY)[$id];
    }

    public function upsertPost($session, $title, $content, $id)
    {
        if (!$session->has(self::POSTS_SESSION_KEY))
        {
            $session->put(self::POSTS_SESSION_KEY, $this->createDummyData());
        }
        $posts = $session->get(self::POSTS_SESSION_KEY);
        if ($id || $id == 0)
        {
            //if the post already exists ($id is not null) then update its properties.
            $posts[$id] = ['title' => $title, 'content' => $content];
        }
        else
        {
            array_push ($posts, ['title' => $title, 'content' => $content]);
        }
        $session->put(self::POSTS_SESSION_KEY, $posts);
    }

    private function createDummyData()
    {
        $posts = [
            [
                'title' => 'Learning Laravel',
                'content' => 'This blog post will get you on your way to learning Laravel!'
            ],
            [
                'title' => 'Advanced Laravel',
                'content' => 'This blog post will cover more advanced topics in Laravel.'
            ]
        ];
        return $posts;
    }
}