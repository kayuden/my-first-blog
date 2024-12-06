<?php

namespace Src\Models;

class Post extends Model {

    public int $id;
    public int $author_id;
    public string $title;
    public string $chapo;
    public string $content;

    protected  $table = 'posts';

    public function getAllPosts(): array
    {
        return $this->query("
        SELECT p.*, u.username 
        FROM posts p
        JOIN users u ON p.author_id = u.id
        ORDER BY creation_date DESC");
    }

    public function findById(int $id): Post
    {
        return $this->query("
        SELECT p.*, u.username
        FROM posts p
        JOIN users u ON p.author_id = u.id
        WHERE p.id = ?
        ORDER BY p.creation_date DESC
        ", [$id], true);
    }
}