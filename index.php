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
            throw Exception('it is\'nt integer');
        }
        if(($red > 255) || ($red < 0)){
            throw Exception('message');
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
            throw Exception('it is\'nt integer');
        }
        if(($green > 255) || ($green < 0)){
            throw Exception('message');
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
            throw Exception('it is\'nt integer');
        }
        if(($blue > 255) || ($blue < 0)){
            throw Exception('message');
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
}

$obj1 = new ValueObject(100,30,50);
$obj2 = new ValueObject(100,30,51);
var_dump($obj1::random());