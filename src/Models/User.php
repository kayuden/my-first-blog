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

    public function createUser(string $username, string $email, string $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->getPDO()->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, $hashedPassword]);
    }

    static function login()
    {
        //vérification username / mot de passe
        //si correspond pas renvoie une erreur sinon renvoie l'instance de l'objet
        //vérifie le statut de l'utilisateur et renvoie une instance d'User ou d'Admin
    }
}