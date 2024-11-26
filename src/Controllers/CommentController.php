<?php

namespace Src\Controllers;

use Src\Models\Comment;

class CommentController extends Controller {

    public function createComment()
    {
        $comment = new Comment($this->connectDB());

        $result = $comment->create($_POST);

        if ($result){
            return header("Location: /my-first-php-blog/posts/{$_SESSION['post_id']}?success=true");
        }
    }
}