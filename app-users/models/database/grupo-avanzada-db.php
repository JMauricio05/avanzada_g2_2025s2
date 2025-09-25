<?php
class GrupoAvanzadaDB
{
    private $hostDb = "localhost";
    private $nameDb = "grupo_2_avanzada";
    private $userDb = "root";
    private $pwdDb = "";

    private $conexDb = null;

    public function __construct()
    {
        $this->conexDb = new mysqli(
            $this->hostDb,
            $this->userDb,
            $this->pwdDb,
            $this->nameDb
        );
        if ($this->conexDb->connect_error) {
            die("". $this->conexDb->connect_error);
        }
    }

    public function execSQL($sql){
        return $this->conexDb->query($sql);
    }    

    public function closeDB(){
        $this->conexDb->close();
    }

}
?>