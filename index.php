<?php

class ValueObject
{
    private $red;
    private $green;
    private $blue;

    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed()
    {
        return $this->red;
    }

    private function setRed($red)
    {
        if(!is_int($red)) {
            throw new Exception('it is\'nt integer');
        }
        if(($red > 255) || ($red < 0)){
            throw new Exception('message');
        }
        $this->red = $red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    private function setGreen($green)
    {
        if(!is_int($green)) {
            throw new Exception('it is\'nt integer');
        }
        if(($green > 255) || ($green < 0)){
            throw new Exception('message');
        }
        $this->green = $green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    private function setBlue($blue)
    {
        if(!is_int($blue)) {
            throw new Exception('it is\'nt integer');
        }
        if(($blue > 255) || ($blue < 0)){
            throw new Exception('message');
        }
        $this->blue = $blue;
    }

    public function equals($obj1, $obj2)
    {
        if($obj1 == $obj2 ){
            return true;
        }
        return false;
    }

    public static function random()
    {
        return new ValueObject(rand(0, 255), rand(0, 255), rand(0,255));
    }

    public function mix($objectNumber)
    {
        return [
            ($this->red + $objectNumber->red) / 2,
            ($this->green + $objectNumber->green) / 2,
            ($this->blue + $objectNumber->blue) /2
        ];
    }
}

$obj1 = new ValueObject(-1,30,50);
$obj2 = new ValueObject(100,30,100);
echo 'Equals ';
var_dump($obj1->equals($obj1, $obj2));
echo "<br>";
echo 'Random ';
var_dump(ValueObject::random());
echo "<br>";
echo 'Mix ';
var_dump($obj1->mix($obj2));


