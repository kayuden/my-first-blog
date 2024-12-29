<?php

namespace Src\Routes;

use Src\Exceptions\NotFoundException;

class Router
{
    public $url;
    public $routes = [];

    public function __construct(string $url)
    {
        $this->url = trim($url, '/');
    }

    public function get(string $path, string $action): void
    {
        $this->routes['GET'][] = new Route($path, $action);
    }
    
    public function post(string $path, string $action): void
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    public function run(): mixed
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if ($route->matches($this->url)) {
               return $route->execute();
            }
        }

        throw new NotFoundException("La page demandée est introuvable.");
    }
}
