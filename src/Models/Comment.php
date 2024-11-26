<?php

namespace Src\Models;

use DateTime;

class Comment extends Model {

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

    
}