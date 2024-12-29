<?php

namespace Src\Routes;

use Src\Database\Connection;

class Route
{
    public $path;
    public $action;
    public $matches;
    const DB_HOST = 'localhost';
    const DB_NAME = 'my_first_blog';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    public function __construct(string $path, string $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url): bool // $url = posts/1 et $this->path = posts/:id
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path); // $path = posts/([^/]+)
        $pathToMatch = "#^$path$#"; // "#^/posts/([^/]+)$#"

        if (preg_match($pathToMatch, $url, $matches)) { // #^/posts/([^/]+)$#,/posts/1 -> ['posts/1', '42']
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute(): mixed
    {
        $params = explode('@', $this->action);
        $controller = new $params[0](new Connection(self::DB_HOST, self::DB_NAME, self::DB_USER, self::DB_PASSWORD));
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}
