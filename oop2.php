<?php
abstract class Point{
    protected $x;
    protected $y;

    function Show(){
        echo "<br/>Координаты: X = ". $this->x .", Y = ". $this->y ."<br/>";
    }

    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    abstract function Area();
    abstract function Perimeter();
    
}

class Rectangle extends Point{

    protected $width;
    protected $height;

    function __construct($top, $left, $width, $heigth)
    {
        parent::__construct($top, $left);
        $this->width = $width;
        $this->height = $heigth;
    }

    function Show()
    {
        parent::Show();
        echo "Ширина: " .$this->width .", Высота: " .$this->height . "<br/>";
    }

    function Area()
    {
        return $this->width * $this->height;
    }

    function Perimeter()
    {
        return 2*($this->width + $this->height);
    }

}

class Circle extends Point{
    protected $radius;
    function __construct($top, $left, $radius){
        parent::__construct($top, $left);
        $this -> radius = $radius;
    }

    function Show()
    {
        parent::Show();
        echo "Радиус: " .$this->radius . "<br/>";
    }

    function Area()
    {
        return pi()*pow($this->radius, 2);
    }

    function Perimeter()
    {
        return 2*pi()*$this->radius;
    }

}
//$p1 = new Point(2, 4);
// $p1->x = 30; 
// $p1->y = 50; 


//echo $p1;
// var_dump($p1);
// $p1->Show();

$rect = new Rectangle(10, 20, 15, 35);
var_dump($rect);
$rect->Show();

$circ = new Circle(25, 40, 10);
$circ -> Show();
$figures = array();
$figures[] = $rect;
$figures[] = $circ;
//$figures[] = $p1;
foreach($figures as $f){
    echo "Area: ". $f->Area()."<br/>";
}
