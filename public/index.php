<?php 

use Router\Router;
use Src\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR) ;
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_first_php_blog');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$router = new Router($_GET['url']);

$router->get('/', 'Src\Controllers\PostController@homepage'); //accueil
$router->get('/posts', 'Src\Controllers\PostController@listPosts'); //liste des posts
$router->get('/posts/:id', 'Src\Controllers\PostController@showPost'); //détail d'un post

$router->get('/register', 'Src\Controllers\UserController@register'); //formulaire d'inscription
$router->post('/register', 'Src\Controllers\UserController@registerPost'); //création d'un user en BDD
$router->get('/register_success', 'Src\Controllers\UserController@registerSuccess'); //création réussie

$router->get('/login', 'Src\Controllers\UserController@login'); //formulaire de connexion
$router->post('/login', 'Src\Controllers\UserController@loginPost'); //connexion et redirection
$router->get('/logout', 'Src\Controllers\UserController@logout'); //déconnexion

$router->get('/admin/posts', 'Src\Controllers\Admin\AdminPostController@index'); //accueil partie admin
$router->get('/admin/posts/create', 'Src\Controllers\Admin\AdminPostController@create'); //page form de création d'un post
$router->post('/admin/posts/create', 'Src\Controllers\Admin\AdminPostController@createPost'); //création d'un post
$router->post('/admin/posts/delete/:id', 'Src\Controllers\Admin\AdminPostController@delete'); //suppression d'un post par id en BDD
$router->get('/admin/posts/edit/:id', 'Src\Controllers\Admin\AdminPostController@edit'); //page form de modif d'un post
$router->post('/admin/posts/edit/:id', 'Src\Controllers\Admin\AdminPostController@update'); //modification d'un post en BDD

try{
    $router->run();
} catch (NotFoundException $e){
    echo $e->error404();
}