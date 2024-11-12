<?php

namespace Src\Controllers;

use Src\Models\User;

class UserController extends Controller {

    public function login()
    {
        return $this->view('authentification/login');
    }

    public function loginPost()
    {
        $user = (new User($this->connectDB()))->getByUsername($_POST['username']);

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = (int) $user->is_admin;
            return header('Location: /my-first-php-blog/admin/posts?success=true');

        } else {
            return header('Location: /my-first-php-blog/login');
        }
    }

    public function logout()
    {
        session_destroy();

        return header('Location: /my-first-php-blog');
    }
}