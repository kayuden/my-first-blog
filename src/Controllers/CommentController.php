<?php

namespace Src\Controllers;

use Src\Models\Comment;

class CommentController extends Controller
{
    public function createComment(): void
    {
        $comment = new Comment($this->connectDB());

        $result = $comment->create(
            $_SESSION['user_id'],
            $_SESSION['post_id'],
            htmlspecialchars($_POST['content'],ENT_SUBSTITUTE | ENT_HTML401)
        );

        if ($result) {
            header("Location: /my-first-blog/posts/{$_SESSION['post_id']}?success=true");
        }
    }
}
