<?php

namespace Src\Database;

use PDO;

class Connection {
    
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct(string $host, string $dbname, string $username, string $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPDO(): PDO
    {
        return $this->pdo ?? $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
        ]);
    }
}