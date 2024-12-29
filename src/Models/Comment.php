<?php

namespace Src\Models;

use DateTime;

class Comment extends Model
{
    public int $id;
    public int $author_id;
    public int $post_id;
    public string $content;
    public int $is_validated;

    protected  $table = 'comments';

    public function findByPostId(int $post_id): array
    {
        return $this->query("
        SELECT c.*, u.username
        FROM comments c
        JOIN users u ON c.author_id = u.id
        WHERE c.post_id = ? AND c.is_validated = 1
        ORDER BY c.creation_date DESC
        ", [$post_id]);
    }

    public function getUnvalidatedComments(): ?array
    {
        return $this->query(
        "SELECT 
        c.*,
        u.username,
        p.title as post_title,
        p.id as post_id
        FROM comments c
        INNER JOIN users u ON c.author_id = u.id
        INNER JOIN posts p ON c.post_id = p.id
        WHERE c.is_validated = 0");
    }

    public function validate(int $id): bool
    {
        return $this->query("UPDATE comments SET is_validated = 1 WHERE id = {$id}");
    }

    public function create(string $author_id, string $post_id, string $content): ?string
    {
        $stmt = $this->db->getPDO()->prepare("INSERT INTO comments (author_id,post_id,content) VALUES (?, ?, ?)");
        return $stmt->execute([$author_id,$post_id,$content]);
    }
}
