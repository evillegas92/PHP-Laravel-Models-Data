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