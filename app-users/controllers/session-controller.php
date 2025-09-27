<?php
namespace App\Controllers;

class SessionController
{
    public function __construct()
    {
        session_start();
    }
    public function create($user)
    {
        $_SESSION['user'] = $user->get('id');
        $_SESSION['username'] = $user->get('userName');
    }

    public function validar($url) {
        if(empty($_SESSION['user'])){
            header("Location: $url");
        }
    }

    public function close() {
        session_unset();
        session_destroy();
    }
}