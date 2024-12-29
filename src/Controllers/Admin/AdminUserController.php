<?php

namespace Src\Controllers\Admin;

use Src\Models\User;
use Src\Models\Admin;
use Src\Controllers\Controller;

class AdminUserController extends Controller
{
    public function getAdminUsers()
    {
        $this->isAdmin();

        $users = (new User($this->connectDB()))->getAll();

        return $this->view('admin/user/index', compact('users'));
    }

    public function update(int $id)
    {
        $this->isAdmin();

        $admin = new Admin($this->connectDB());
        $result = $admin->updateUser($id, $_POST);

        if ($result) {
            return header('Location: /my-first-blog/admin/users');
        }
    }

    public function delete(int $id)
    {
        $this->isAdmin();
        
        $admin = new Admin($this->connectDB());
        $result = $admin->delete($id);

        if ($result) {
            return header('Location: /my-first-blog/admin/users');
        }
    }
}