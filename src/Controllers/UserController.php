<?php

namespace Src\Controllers;

use Src\Models\User;
use Src\Validation\Validator;

class UserController extends Controller {

    public function register()
    {
        return $this->view('authentification/register');
    }

    public function registerPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required'],
            'email' => ['required'],
            'email-conf' => ['required', 'confirmation'],
            'password' => ['required', 'min:16'],
            'password-conf' => ['required', 'min:16', 'confirmation']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /my-first-php-blog/register');
            exit;
        }

        $user = new User($this->connectDB());

        $result = $user->createUser($_POST['username'],$_POST['email'],$_POST['password']);

        if ($result){
            return header('Location: /my-first-php-blog/register_success');
        }
    }

    public function registerSuccess()
    {
        return $this->view('authentification/register_success');
    }

    public function login()
    {
        return $this->view('authentification/login');
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /my-first-php-blog/login');
            exit;
        }

        $user = (new User($this->connectDB()))->getByUsername($_POST['username']);

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['isAdmin'] = (int) $user->is_admin;
            $_SESSION['user_id'] = (int) $user->id;
            $_SESSION['username'] = (string) $user->username;

            if ($_SESSION['isAdmin'] === 1){
                return header('Location: /my-first-php-blog/admin/posts?success=true');
            } else {
                return header('Location: /my-first-php-blog/posts');
            }
            

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