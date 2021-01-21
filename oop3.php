<?php
class Rectangle {
    protected $top;
    protected $left;
    protected $width;
    protected $height;
    function __construct($t, $l, $w, $h)
    {
        $this->top=$t;
        $this->left=$l;
        $this->width=$w;
        $this->height=$h;
    }
    function Show(){
        echo "<br/> Координаты: X= ". $this->top.", Y=". $this->left."<br/>";

        echo "Ширина: " .$this->width .", Высота: ". $this->height."<br/>";
    }
    public static function createInstance($x1, $x2, $y1, $y2)
    {
        $instance=new self($x1, $y1, $x2-$x1, $y2-$y1);
        return $instance;
    }
    public static function createInstance2($w, $h)
    {
        $instance=new self(0, 0, $w, $h);
        return $instance;
    }
}

$ob1= new Rectangle (10, 20, 25, 45);
$ob2= Rectangle::createInstance(10, 20, 25, 45);
$ob3= Rectangle::createInstance2(15,25);
$arr = array();
$arr[] = $ob1;
$arr[] = $ob2;
$arr[] = $ob3;
foreach($arr as $rect){
    $rect->Show();
}