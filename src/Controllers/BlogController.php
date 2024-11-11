<?php

namespace Src\Controllers;

class BlogController extends Controller {

    public function index()
    {
        return $this->view('blog/index'); //. au lieu de / comme dans Laravel
    }


    public function show(int $id)
    {
        $req = $this->db->getPDO()->query('SELECT * FROM posts');
        $posts = $req->fetchAll();
        var_dump($posts);
        return $this->view('blog/show', compact('id'));
    }
}