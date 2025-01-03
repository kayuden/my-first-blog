<?php

namespace Src\Controllers;

use Src\Models\User;
use Src\Validation\Validator;

class UserController extends Controller
{
    public function register(): void
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: /my-first-blog');
        } else {
            $this->view('authentification/register');
        }
    }

    // Register a new user
    public function registerPost(): void 
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
            header('Location: /my-first-blog/register');
            return;
        }

        $user = new User($this->connectDB());

        $result = $user->createUser(
        htmlspecialchars($_POST['username'],ENT_SUBSTITUTE | ENT_HTML401),
        htmlspecialchars($_POST['email'],ENT_SUBSTITUTE | ENT_HTML401),
        htmlspecialchars($_POST['password'],ENT_SUBSTITUTE | ENT_HTML401)
        );
        

        if ($result) {
            header('Location: /my-first-blog?success_register=true');
        }
    }

    public function login(): void
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: /my-first-blog');
        } else {
            $this->view('authentification/login');
        }
    }

    public function loginPost(): void
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /my-first-blog/login');
            return;
        }

        $user = (new User($this->connectDB()))->getByUsername(
            htmlspecialchars(
                $_POST['username'],
                ENT_SUBSTITUTE | ENT_HTML401
            )
        );
        
        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['isAdmin'] = (int) $user->is_admin;
            $_SESSION['user_id'] = (int) $user->id;
            $_SESSION['username'] = (string) $user->username;

            header('Location: /my-first-blog?success=true');
            

        } else {
            header('Location: /my-first-blog/login?error=true');
        }
    }

    public function logout(): void
    {
        session_destroy();

        header('Location: /my-first-blog');
    }
}
