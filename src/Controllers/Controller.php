<?php

namespace Src\Controllers;

use Src\Database\Connection;

abstract class Controller {

    protected $db;

    public function __construct(Connection $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

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

    protected function isAdmin()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth'] === 1) {
            return true;
        } else {
            return header('Location: /my-first-php-blog/login');
        }
    }
}