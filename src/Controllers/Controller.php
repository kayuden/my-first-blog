<?php

namespace Src\Controllers;

use Src\Database\Connection;

class Controller 
{
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function view(string $path, array $params = null)
    {
        if ($path != "blog/index"){
            ob_start();
            require VIEWS . $path . '.php';
            if ($params) {
                $params = extract($params);
            }
            $content = ob_get_clean();
            require VIEWS . 'layout.php';
        } else {
            require VIEWS . $path . '.php';
        }
    }
}