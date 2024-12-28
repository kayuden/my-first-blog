<?php

namespace Src\Controllers\Admin;

use Src\Controllers\Controller;
use Src\Models\Post;

class AdminPostController extends Controller
{
    public function getAdminPosts()
    {
        $this->isAdmin();

        $posts = (new Post($this->connectDB()))->getAllPosts();

        return $this->view('admin/post/index', compact('posts'));
    }

    public function create()
    {
        $this->isAdmin();

        return $this->view('admin/post/form');
    }
    
    public function createPost()
    {
        $this->isAdmin();

        $post = new Post($this->connectDB());

        $result = $post->create($_POST);

        if ($result) {
            return header('Location: /my-first-blog/admin/posts');
        }
    }

    public function edit(int $id)
    {
        $this->isAdmin();

        $post = (new Post($this->connectDB()))->findById($id);
        
        return $this->view('admin/post/form', compact('post'));
    }

    public function update(int $id)
    {
        $this->isAdmin();

        $post = new Post($this->connectDB());
        $result = $post->update($id, $_POST);

        if ($result) {
            return header('Location: /my-first-blog/admin/posts');
        }
    }

    public function delete(int $id)
    {
        $this->isAdmin();
        
        $post = new Post($this->connectDB());
        $result = $post->delete($id);

        if ($result) {
            return header('Location: /my-first-blog/admin/posts');
        }
    }
}