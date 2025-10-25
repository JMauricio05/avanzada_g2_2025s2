<?php
namespace App\Controllers;

use App\Models\User;
use Exception;

class UsersController
{

    public function index()
    {
        $rows = User::all();
        if (count($rows) == 0) {
            return null;
        }
        return $rows->toJson();
    }

    public function detail($id)
    {
        if (empty($id)) {
            throw new Exception("ID null", 2);
        }
        $row = User::find($id);
        if (empty($row)) {
            throw new Exception("User null", 1);
        }
        return $row->toJson();
    }

    public function create($request)
    {
        $user = new User();
        $user->userName = $request['user'];
        $user->password = $request['pwd'];
        $user->save();
        return $user->toJson();
    }

    public function update($id, $data)
    {
        $user = User::find($id);
        $user->userName = $data['user'];
        $user->password = $data['pwd'];
        $user->save();
        return $user->toJson();
    }

    public function delete($id)
    {
        if (empty($id)) {
            throw new Exception("ID null", 2);
        }
        $user = User::find($id);
        if (empty($user)) {
            throw new Exception("User null", 1);
        }
        if (!$user->delete()) {
            throw new Exception("Error delete", 3);
        }
        return true;
    }

}