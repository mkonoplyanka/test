<?php

class ValueObject
{
    private $red;
    private $green;
    private $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    private function validate($value)
    {
        if (($value > 255) || ($value < 0)){
            throw new InvalidArgumentException('Incorrect range');
        }
    }

    public function getRed()
    {
        return $this->red;
    }

    private function setRed($red)
    {
        $this->validate($red);
        $this->red = $red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    private function setGreen($green)
    {
        $this->validate($green);
        $this->green = $green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    private function setBlue($blue)
    {
        $this->validate($blue);
        $this->blue = $blue;
    }

    public function equals(ValueObject $obj1, ValueObject $obj2): bool
    {
        if($obj1 == $obj2 ){
            return true;
        }
        return false;
    }

    public static function random(): ValueObject
    {
        return new ValueObject(rand(0, 255), rand(0, 255), rand(0,255));
    }

    public function mix(ValueObject $objectNumber): ValueObject
    {
        return new ValueObject(
            ($this->red + $objectNumber->red) / 2,
            ($this->green + $objectNumber->green) / 2,
            ($this->blue + $objectNumber->blue) / 2,
        );
    }
}

$obj1 = new ValueObject(100,30,100);
$obj2 = new ValueObject(100,50,100);
echo 'Equals ';
var_dump($obj1->equals($obj1, $obj2));
echo "<br>";
echo 'Random ';
var_dump(ValueObject::random());
echo "<br>";
echo 'Mix ';
var_dump($obj1->mix($obj2));


