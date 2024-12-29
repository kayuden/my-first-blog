<?php

namespace Src\Controllers;

use Src\Models\Post;
use Src\Models\Comment;

class PostController extends Controller
{
    public function homepage(): void
    {
        $post = new Post($this->connectDB());
        $posts = $post->getAllPosts();
        $this->view('blog/homepage', compact('posts'));
    }
    
    public function listPosts(): void
    {
        $post = new Post($this->connectDB());
        $posts = $post->getAllPosts();
        $this->view('blog/list_posts', compact('posts'));
    }

    public function showPost(int $id): void
    {
        $post = new Post($this->connectDB());
        $post = $post->findById($id);

        $comment = new Comment($this->connectDB());
        $comment = $comment->findByPostId($id);

        $this->view('blog/show_post', compact('post', 'comment'));
    }
}
