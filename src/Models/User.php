<?php

namespace Src\Models;

class User extends Model
{
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public int $is_admin;

    protected $table = 'users';

    public function getByUsername(string $username): User|bool
    {
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);
    }

    public function createUser(string $username, string $email, string $password): bool
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->getPDO()->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, $hashedPassword]);
    }
}
