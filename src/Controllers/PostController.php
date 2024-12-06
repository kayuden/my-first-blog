<?php

namespace Src\Controllers;

use Src\Models\Post;
use Src\Models\Comment;

class PostController extends Controller {

    public function homepage()
    {
        return $this->view('blog/homepage');
    }
    
    public function listPosts()
    {
        $post = new Post($this->connectDB());
        $posts = $post->getAllPosts();
        return $this->view('blog/list_posts', compact('posts'));
    }

    public function showPost(int $id)
    {
        $post = new Post($this->connectDB());
        $post = $post->findById($id);

        $comment = new Comment($this->connectDB());
        $comment = $comment->findByPostId($id);

        return $this->view('blog/show_post', compact('post', 'comment'));
    }
}