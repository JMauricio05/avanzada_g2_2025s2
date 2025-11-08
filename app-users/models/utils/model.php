<?php
namespace App\Models\Utils;

abstract class Model
{
    protected $pepito;
    
    abstract public function all();
    abstract public function find();
    abstract public function save();
    abstract public function update();
    abstract public function delete();
}