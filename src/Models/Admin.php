<?php

namespace Src\Models;

class Admin extends User
{
    // Create post
    public function createPost(): bool
    {
        $post = new Post($this->db);
        return $post->create(
        $_SESSION['user_id'],
        htmlspecialchars($_POST['title'],ENT_SUBSTITUTE | ENT_HTML401),
        htmlspecialchars($_POST['chapo'],ENT_SUBSTITUTE | ENT_HTML401),
        htmlspecialchars($_POST['content'],ENT_SUBSTITUTE | ENT_HTML401)
        );

    }

    // Update post
    public function updatePost(int $postId): bool
    {
        $post = new Post($this->db);
        return $post->update($postId, $_POST);
    }

    // Delete Post
    public function deletePost(int $postId): bool
    {
        $post = new Post($this->db);
        return $post->delete($postId);
    }

    // Validate Comment
    public function validateComment(int $commentId): bool
    {
        $comment = new Comment($this->db);
        return $comment->validate($commentId);
    }

    // Reject Comment
    public function deleteComment(int $commentId): bool
    {
        $comment = new Comment($this->db);
        return $comment->delete($commentId);
    }

    // Change user role
    public function updateUser(int $userId): bool
    {
        $user = new User($this->db);
        return $user->update($userId, $_POST);
    }

    // Delete user
    public function deleteUser(int $userId): bool
    {
        $user = new User($this->db);
        return $user->delete($userId);
    }
}
