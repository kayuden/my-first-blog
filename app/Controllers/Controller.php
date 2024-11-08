<?php

namespace App\Controllers;

class Controller 
{

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