<?php

class User
{
    private $id;
    private $userName;
    private $password;

    public function setId($val)
    {
        $this->id = $val;
    }
    public function getId()
    {
        return $this->id;
    }

    public function set($prop, $val)
    {
        $this->{$prop} = $val;
    }
    public function get($prop)
    {
        return $this->{$prop};
    }
}

?>