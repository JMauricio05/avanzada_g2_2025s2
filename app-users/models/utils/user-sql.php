<?php

namespace App\Models\Utils;

class UserSQL
{

    public static function selectAll()
    {
        return "select * from users";
    }

    public static function selectByUserPwd()
    {
        return "select * from users where userName=? and password=?";
    }

    public static function insertInto()
    {
        return "insert into users (userName, password)values(?,?)";
    }
}
