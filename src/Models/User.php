<?php

namespace Src\Models;

class User extends Model {

    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public int $is_validated;
    public int $is_admin;

    protected $table = 'users';

    public function getByUsername(string $username)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);
    }
}