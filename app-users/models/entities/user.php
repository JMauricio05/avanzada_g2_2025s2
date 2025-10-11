<?php

namespace App\Models\Entities;

require __DIR__ . '/../utils/model.php';
require __DIR__ . '/../utils/user-sql.php';
require __DIR__ . '/../database/grupo-avanzada-db.php';

use App\Models\Utils\Model;
use App\Models\Utils\UserSQL;
use App\Models\Databases\GrupoAvanzadaDB;


class User extends Model
{
    private $id;
    private $userName;
    private $password;

    public function set($prop, $val)
    {
        $this->{$prop} = $val;
    }
    public function get($prop)
    {
        return $this->{$prop};
    }

    public function all()
    {
        $sql = UserSQL::selectAll();
        $db = new GrupoAvanzadaDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $user = new User();
                $user->set('id', $item['id']);
                $user->set('userName', $item['userName']);
                array_push($rows, $user);
            }
        }
        return $rows;
    }

    public function find()
    {
        $sql = UserSQL::selectByUserPwd();
        $db = new GrupoAvanzadaDB();
        $db->setIsSqlSelect(true);
        $result = $db->execSQL(
            $sql,
            "ss",
            $this->userName,
            $this->password
        );
        $user = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User();
                $user->id = $row["id"];
                $user->userName = $row["userName"];
                $user->password = $row["password"];
                break;
            }
        }
        return $user;
    }

    public function save(){
        $sql = UserSQL::insertInto();
        $db = new GrupoAvanzadaDB();
        $result = $db->execSQL($sql, "ss", $this->userName, $this->password);
        return $result;
    }
}
