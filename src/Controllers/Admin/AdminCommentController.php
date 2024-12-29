<?php

namespace Src\Controllers\Admin;

use Src\Models\Admin;
use Src\Models\Comment;
use Src\Controllers\Controller;

class AdminCommentController extends Controller
{
    public function getAdminComments(): void
    {
        $this->isAdmin();

        $comments = (new Comment($this->connectDB()))->getUnvalidatedComments();

        $this->view('admin/comment/index', compact('comments'));
    }

    public function validate(int $id): void
    {
        $this->isAdmin();

        $admin = new Admin($this->connectDB());
        $result = $admin->validateComment($id);

        if ($result) {
            header('Location: /my-first-blog/admin/comments');
        }
    }

    public function delete(int $id): void
    {
        $this->isAdmin();
        
        $admin = new Admin($this->connectDB());
        $result = $admin->deleteComment($id);

        if ($result) {
            header('Location: /my-first-blog/admin/comments');
        }
    }
}
