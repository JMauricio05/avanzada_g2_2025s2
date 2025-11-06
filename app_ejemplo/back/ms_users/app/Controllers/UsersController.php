<?php
namespace App\Controllers;

use App\Models\User;
use Exception;

class UserControllers
{

    public function login($username, $password)
    {
        $row = User::where('userName', $username)
            ->where('password', $password)
            ->first();
        if (empty($row)) {
            throw new Exception("User null", 1);
        }
        return $row;
    }

}