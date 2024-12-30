<?php

namespace Src\Models;

class Post extends Model
{
    public int $id;
    public int $author_id;
    public string $title;
    public string $chapo;
    public string $content;

    protected $table = 'posts';

    public function getAllPosts(): ?array
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

    public function getSummary(): string
    {
        return substr($this->content, 0, 600) . '...';
    }

    public function capitalizeTitleFirstLetter(): string
    {
        $title = strtolower($this->title);

        $title = preg_replace_callback('/\b[a-zéèêëàâäîïôöûüùÿç]+/i', function($matches) {
            return ucfirst($matches[0]);
        }, $title);

        return $title;
    }

    public function create(string $author_id, string $title, string $chapo, string $content): bool
    {
        $stmt = $this->db->getPDO()->prepare("INSERT INTO posts (author_id,title,chapo,content) 
        VALUES (?, ?, ?, ?)");
        return $stmt->execute([$author_id,$title,$chapo,$content]);
    }
}
