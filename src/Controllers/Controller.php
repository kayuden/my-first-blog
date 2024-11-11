<?php

namespace Src\Controllers;

use Src\Database\Connection;

abstract class Controller {

    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    protected function view(string $path, array $params = null)
    {
        if ($path !== "blog/homepage" && $path !== "blog/list_posts"){
            ob_start();
            require VIEWS . $path . '.php';
            $content = ob_get_clean();
            require VIEWS . 'layout.php';
        } else {
            require VIEWS . $path . '.php';
        }
    }

    protected function connectDB()
    {
        return $this->db;
    }
}