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

    public static function getViewsPath(): string
    {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR;
    }

    protected function view(string $path, array $params = null): void
    {
        ob_start();
        require self::getViewsPath() . $path . '.php';
        $content = ob_get_clean();

        if (strpos($path, "admin") !== false) {
            require self::getViewsPath() . 'layout_admin.php';
        } else {
            require self::getViewsPath() . 'layout.php';
        }
    }

    protected function connectDB(): Connection
    {
        return $this->db;
    }

    protected function isAdmin(): ?bool
    {
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === 1) {
            return true;
        } elseif ($_SESSION['isAdmin'] === 0) {
            header('Location: /my-first-blog');
        } else {
            header('Location: /my-first-blog/login');
        }
    }
}
