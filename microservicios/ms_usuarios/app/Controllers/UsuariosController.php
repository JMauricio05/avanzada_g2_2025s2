<?php
namespace App\Controllers;

use App\Models\User;

class UsuariosController
{
    function sumar($num1, $num2)
    {
        return [
            "num1" => $num1,
            "num2" => $num2,
            "sumar" => $num1 + $num2
        ];
    }

    function consultarUsuarios()
    {
        $usuarios = User::all();
        return $usuarios->toJson();
    }
}