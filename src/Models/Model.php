<?php

namespace Src\Models;

use PDO;
use DateTime;
use Src\Database\Connection;

abstract class Model {
    
    protected $db;
    protected $table;
    protected $creation_date;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getCreationDate(): string
    {
        return $date = (new DateTime($this->creation_date))->format('d/m/Y à H:i');
    }

    public function create(array $data)
    {
        if (isset($_SESSION['user_id'])) {
            $data['author_id'] = $_SESSION['user_id'];
        }

        if (isset($_SESSION['post_id'])) {
            $data['post_id'] = $_SESSION['post_id'];
        }

        $firstParenthesis = "";
        $secondParenthesis = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? "" : ", ";
            $firstParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= ":{$key}{$comma}";
            $i++;
        }

        echo("INSERT INTO {$this->table} ($firstParenthesis) VALUES ($secondParenthesis)".print_r($data, true));
        die();

        return $this->query("INSERT INTO {$this->table} ($firstParenthesis)
        VALUES ($secondParenthesis)", $data);
    }

    public function update(int $id, array $data)
    {
        $sqlRequestPart = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? "" : ", ";
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;

        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} WHERE id = :id", $data);
    }

    public function delete(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if (
            strpos($sql, 'DELETE') === 0 
            || strpos($sql, 'UPDATE') === 0 
            || strpos($sql, 'INSERT') === 0) {

            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
            }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method ==='query'){
            return $stmt->$fetch();
        } else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }
}