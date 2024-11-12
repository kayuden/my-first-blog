<?php

namespace Src\Controllers\Admin;

use Src\Controllers\Controller;
use Src\Models\Post;

class AdminPostController extends Controller{

    public function index()
    {
        $posts = (new Post($this->connectDB()))->getAll();

        return $this->view('admin/post/index', compact('posts'));
    }

    public function create()
    {
        return $this->view('admin/post/form');
    }
    
    public function createPost()
    {
        $post = new Post($this->connectDB());

        $result = $post->create($_POST);

        if ($result){
            return header('Location: /my-first-php-blog/admin/posts');
        }
    }

    public function edit(int $id)
    {
        $post = (new Post($this->connectDB()))->findById($id);
        
        return $this->view('admin/post/form', compact('post'));
    }

    public function update(int $id)
    {
        $post = new Post($this->connectDB());
        $result = $post->update($id, $_POST);

        if ($result){
            return header('Location: /my-first-php-blog/admin/posts');
        }
    }

    public function delete(int $id)
    {
        $post = new Post($this->connectDB());
        $result = $post->delete($id);

        if ($result){
            return header('Location: /my-first-php-blog/admin/posts');
        }
    }
}