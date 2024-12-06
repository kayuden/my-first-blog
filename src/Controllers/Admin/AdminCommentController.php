<?php

namespace Src\Controllers\Admin;

use Src\Models\Comment;
use Src\Controllers\Controller;

class AdminCommentController extends Controller{

    public function getAdminComments()
    {
        $this->isAdmin();

        $comments = (new Comment($this->connectDB()))->getUnvalidatedComments();

        return $this->view('admin/comment/index', compact('comments'));
    }

    public function validate(int $id)
    {
        $this->isAdmin();

        $comment = new Comment($this->connectDB());
        $result = $comment->validate($id);

        if ($result){
            return header('Location: /my-first-php-blog/admin/comments');
        }
    }

    public function delete(int $id)
    {
        $this->isAdmin();
        
        $comment = new Comment($this->connectDB());
        $result = $comment->delete($id);

        if ($result){
            return header('Location: /my-first-php-blog/admin/comments');
        }
    }
}