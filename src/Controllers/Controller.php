<?php

namespace Src\Controllers;

use Src\Database\Connection;

abstract class Controller
{
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
        ob_start();
            require VIEWS . $path . '.php';
            $content = ob_get_clean();
        if (strpos($path, "admin") !== false) {
            require VIEWS . 'layout_admin.php';
        } else {
            require VIEWS . 'layout.php';
        }
    }

    protected function connectDB(): Connection
    {
        return $this->db;
    }

    protected function isAdmin(): bool
    {
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === 1) {
            return true;
        } elseif ($_SESSION['isAdmin'] === 0) {
            return header('Location: /my-first-blog');
        } else {
            return header('Location: /my-first-blog/login');
        }
    }
}
