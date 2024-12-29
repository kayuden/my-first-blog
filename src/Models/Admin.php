<?php

namespace Src\Models;

class Admin extends User
{
    public function createPost(): bool
    {
        $post = new Post($this->db);
        return $post->create($_SESSION['user_id'],$_POST['title'],$_POST['chapo'],$_POST['content']);
    }

    public function updatePost(int $postId): bool
    {
        $post = new Post($this->db);
        return $post->update($postId, $_POST);
    }

    public function deletePost(int $postId): bool
    {
        $post = new Post($this->db);
        return $post->delete($postId);
    }

    public function validateComment(int $commentId): bool
    {
        $comment = new Comment($this->db);
        return $comment->validate($commentId);
    }

    public function deleteComment(int $commentId): bool
    {
        $comment = new Comment($this->db);
        return $comment->delete($commentId);
    }

    public function updateUser(int $userId): bool
    {
        $user = new User($this->db);
        return $user->update($userId, $_POST);
    }

    public function deleteUser(int $userId): bool
    {
        $user = new User($this->db);
        return $user->delete($userId);
    }
}
