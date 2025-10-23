<?php
namespace App\Controllers;

use App\Models\User;

class UsersController
{

    public function index(){
        $rows = User::all();
        return $rows->toJson();
    }

    public function detail($id){
        $row = User::find($id);
        return $row->toJson();
    }

    public function create($request){
        $user = new User();
        $user->userName = $request['user'];
        $user->password = $request['pwd'];
        $user->save();
        return $user->toJson();
    }

}