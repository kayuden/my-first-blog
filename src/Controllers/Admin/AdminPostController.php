<?php

namespace Src\Controllers\Admin;

use Src\Models\Post;
use Src\Models\Admin;
use Src\Controllers\Controller;

class AdminPostController extends Controller
{
    public function getAdminPosts(): void
    {
        $this->isAdmin();

        $posts = (new Post($this->connectDB()))->getAllPosts();

        $this->view('admin/post/index', compact('posts'));
    }

    public function create(): void
    {
        $this->isAdmin();

        $this->view('admin/post/form');
    }
    
    public function createPost(): void
    {
        $this->isAdmin();

        $admin = new Admin($this->connectDB());
        $result = $admin->createPost($_POST);

        if ($result) {
            header('Location: /my-first-blog/admin/posts');
        }
    }

    public function edit(int $id): void
    {
        $this->isAdmin();

        $post = (new Post($this->connectDB()))->findById($id);
        
        $this->view('admin/post/form', compact('post'));
    }

    public function update(int $id): void
    {
        $this->isAdmin();

        $admin = new Admin($this->connectDB());
        $result = $admin->updatePost($id, $_POST);

        if ($result) {
            header('Location: /my-first-blog/admin/posts');
        }
    }

    public function delete(int $id): void
    {
        $this->isAdmin();
        
        $admin = new Admin($this->connectDB());
        $result = $admin->deletePost($id);

        if ($result) {
            header('Location: /my-first-blog/admin/posts');
        }
    }
}
