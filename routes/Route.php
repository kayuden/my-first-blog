<?php

namespace Router;

use Src\Database\Connection;

class Route {
    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url) // $url = posts/1 et $this->path = posts/:id
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

    public function execute()
    {
        $params = explode('@', $this->action);
        $controller = new $params[0](new Connection(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD));
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}