<?php

require_once 'autoload.php';

$objC = new Test\Currency('USD');
$objC1 = new Test\Currency('USD');

$objM = new Test\Money(150, $objC);
$objM1 = new Test\Money(250, $objC1);

var_dump($objC);
echo "<br>";
var_dump($objC1);
echo "<br> Equals method - ";
var_dump($objC->equals($objC1));
echo "<br>";
var_dump($objM);
echo "<br>";
var_dump($objM1);
echo "<br> Equals method - ";
var_dump($objM->equals($objM1));
echo "<br> - Add method - ";
var_dump($objM->add($objM1));






