<?php 

use Src\Routes\Router;
use Src\Exceptions\NotFoundException;

require_once '../vendor/autoload.php';
require_once '../config/Config.php';

$router = new Router($_GET['url']);

$router->get('/', 'Src\Controllers\PostController@homepage'); //homepage
$router->post('/send', 'Src\Controllers\ContactController@sendMail'); //send e-mail contact form
$router->get('/posts', 'Src\Controllers\PostController@listPosts'); //list of posts
$router->get('/posts/:id', 'Src\Controllers\PostController@showPost'); //detail of a post

$router->post('/comments/create', 'Src\Controllers\CommentController@createComment'); //create a comment

$router->get('/register', 'Src\Controllers\UserController@register'); //registration form
$router->post('/register', 'Src\Controllers\UserController@registerPost'); //create a user in DB

$router->get('/login', 'Src\Controllers\UserController@login'); //login form
$router->post('/login', 'Src\Controllers\UserController@loginPost'); //connexion and redirection
$router->get('/logout', 'Src\Controllers\UserController@logout'); //logout

/*admin part*/

//posts management
$router->get('/admin/posts', 'Src\Controllers\Admin\AdminPostController@getAdminPosts'); //list posts
$router->get('/admin/posts/create', 'Src\Controllers\Admin\AdminPostController@create'); //post creation form
$router->post('/admin/posts/create', 'Src\Controllers\Admin\AdminPostController@createPost'); //create a new post in DB
$router->post('/admin/posts/delete/:id', 'Src\Controllers\Admin\AdminPostController@delete'); //delete a post in DB
$router->get('/admin/posts/edit/:id', 'Src\Controllers\Admin\AdminPostController@edit'); //post modification form
$router->post('/admin/posts/edit/:id', 'Src\Controllers\Admin\AdminPostController@update'); //modify a post in DB

//comments management
$router->get('/admin/comments', 'Src\Controllers\Admin\AdminCommentController@getAdminComments'); //liste les commentaires à valider
$router->get('/admin/comments/validate/:id', 'Src\Controllers\Admin\AdminCommentController@validate'); //validate a comment in DB
$router->post('/admin/comments/delete/:id', 'Src\Controllers\Admin\AdminCommentController@delete'); //delete a comment in DB

//users management
$router->get('/admin/users', 'Src\Controllers\Admin\AdminUserController@getAdminUsers'); //list of users
$router->post('/admin/users/changerole/:id', 'Src\Controllers\Admin\AdminUserController@update'); //validate a user in DB
$router->post('/admin/users/delete/:id', 'Src\Controllers\Admin\AdminUserController@delete'); //delete a user in DB


try{
    $router->run();
} catch (NotFoundException $e){
    echo $e->error404();
}
