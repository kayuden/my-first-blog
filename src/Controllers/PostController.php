<?php

namespace Src\Controllers;

use Src\Models\Post;

class PostController extends Controller {

    public function homepage()
    {
        return $this->view('blog/homepage');
    }
    
    public function listPosts()
    {
        $post = new Post($this->connectDB());
        $posts = $post->getAll();
        return $this->view('blog/list_posts', compact('posts'));
    }

    public function showPost(int $id)
    {
        $post = new Post($this->connectDB());
        $post = $post->findById($id);
        return $this->view('blog/show_post', compact('post'));
    }
}