<?php

interface FiguraGometrica
{
    public function area();
}

abstract class Model
{
    private $id;

    abstract public function get($nameProperty);
    abstract public function set($nameProperty, $value);

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
}

class Cuadrado implements FiguraGometrica
{
    public $arista = null;


    public function area()
    {
        return $this->arista * $this->arista;
    }
}
class Triangulo implements FiguraGometrica
{
    private $base = null;
    private $altura = null;

    public function setBase($value)
    {
        $this->base = $value;
    }
    public function setAltura($value)
    {
        $this->altura = $value;
    }

    public function area()
    {
        return ($this->base * $this->altura) / 2;
    }
}


class Rectangulo extends Model implements FiguraGometrica
{
    private $base = null;
    private $altura = null;

    public function __construct($id)
    {
        parent::setId($id);
    }

    public function area()
    {
        return ($this->base * $this->altura);
    }

    public function set($nameProperty, $value)
    {
        $this->{$nameProperty} = $value;
    }
    public function get($nameProperty)
    {
        return $this->{$nameProperty};
    }

}

$cuadrado = new Cuadrado();
$cuadrado->arista = 5;
echo "Area del cuadrado: " . $cuadrado->area();

$triangulo = new Triangulo();
$triangulo->setBase(5);
$triangulo->setAltura(5);
echo '<br>' . $triangulo->area() . '<br>';


$rectangulo = new Rectangulo('prueba1');
$rectangulo->set('base', 10);
$rectangulo->set('altura', 5);
echo '<br>' . $rectangulo->area() . '<br>';
?>