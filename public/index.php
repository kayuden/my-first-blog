<?php 

use Src\Routes\Router;
use Src\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR) ;
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_first_blog');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$router = new Router($_GET['url']);

$router->get('/', 'Src\Controllers\PostController@homepage'); //accueil
$router->get('/posts', 'Src\Controllers\PostController@listPosts'); //liste des articles
$router->get('/posts/:id', 'Src\Controllers\PostController@showPost'); //détail d'un article

$router->post('/comments/create', 'Src\Controllers\CommentController@createComment'); //création d'un commentaire

$router->get('/register', 'Src\Controllers\UserController@register'); //formulaire d'inscription
$router->post('/register', 'Src\Controllers\UserController@registerPost'); //création d'un user en BDD
$router->get('/register_success', 'Src\Controllers\UserController@registerSuccess'); //création réussie

$router->get('/login', 'Src\Controllers\UserController@login'); //formulaire de connexion
$router->post('/login', 'Src\Controllers\UserController@loginPost'); //connexion et redirection
$router->get('/logout', 'Src\Controllers\UserController@logout'); //déconnexion

/*partie admin*/

//gestion des posts
$router->get('/admin/posts', 'Src\Controllers\Admin\AdminPostController@getAdminPosts'); //liste les articles
$router->get('/admin/posts/create', 'Src\Controllers\Admin\AdminPostController@create'); //page form de création d'un article
$router->post('/admin/posts/create', 'Src\Controllers\Admin\AdminPostController@createPost'); //création d'un article
$router->post('/admin/posts/delete/:id', 'Src\Controllers\Admin\AdminPostController@delete'); //suppression d'un article en BDD
$router->get('/admin/posts/edit/:id', 'Src\Controllers\Admin\AdminPostController@edit'); //page form de modif d'un article
$router->post('/admin/posts/edit/:id', 'Src\Controllers\Admin\AdminPostController@update'); //modification d'un article en BDD

//gestion des commentaires
$router->get('/admin/comments', 'Src\Controllers\Admin\AdminCommentController@getAdminComments'); //liste les commentaires à valider
$router->get('/admin/comments/validate/:id', 'Src\Controllers\Admin\AdminCommentController@validate'); //validation d'un commentaire en BDD
$router->post('/admin/comments/delete/:id', 'Src\Controllers\Admin\AdminCommentController@delete'); //suppression d'un commentaire en BDD

//gestion des utilisateurs
$router->get('/admin/users', 'Src\Controllers\Admin\AdminUserController@getAdminUsers'); //liste les utilisateurs
$router->post('/admin/users/changerole/:id', 'Src\Controllers\Admin\AdminUserController@update'); //modification du rôle d'un utilisateur en BDD
$router->post('/admin/users/delete/:id', 'Src\Controllers\Admin\AdminUserController@delete'); //suppression d'un utilisateur en BDD


try{
    $router->run();
} catch (NotFoundException $e){
    echo $e->error404();
}