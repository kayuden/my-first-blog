<?php 

use Router\Router;
use Src\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR) ;
define('DB_HOST', 'localhost');
define('DB_NAME', 'my-first-php-blog');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$router = new Router($_GET['url']);

$router->get('/', 'Src\Controllers\PostController@homepage');
$router->get('/posts', 'Src\Controllers\PostController@listPosts');
$router->get('/posts/:id', 'Src\Controllers\PostController@showPost');

try{
    $router->run();
} catch (NotFoundException $e){
    echo $e->error404();
}