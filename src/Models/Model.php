<?php

namespace Src\Models;

use PDO;
use Src\Database\Connection;

abstract class Model {
    
    protected $db;
    protected $table;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getAll(): array
    {
        $stmt = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY creation_date DESC");
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        return $stmt->fetchAll();
    }

    public function findById(int $id): Model
    {
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

}