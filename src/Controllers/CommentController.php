<?php

namespace Src\Controllers;

use Src\Models\Comment;

class CommentController extends Controller
{
    public function createComment()
    {
        $comment = new Comment($this->connectDB());

        $result = $comment->create($_SESSION['user_id'],$_SESSION['post_id'],$_POST['content']);

        if ($result) {
            return header("Location: /my-first-blog/posts/{$_SESSION['post_id']}?success=true");
        }
    }
}
