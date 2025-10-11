<?php
namespace App\Models\Utils;

abstract class Model
{
    abstract public function all();
    abstract public function find();
    abstract public function save();
    abstract public function update();
}