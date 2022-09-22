<?php

require_once 'autoload.php';

$objC = new Test\Currency('USD');
$objC1 = new Test\Currency('EUR');

$objM = new Test\Money(150, 'USD');
$objM1 = new Test\Money(150, 'USD');

var_dump($objC, $objC1);
echo "<br>";
var_dump($objC->equals($objC1));
echo "<br>";
var_dump($objM, $objM1);
echo "<br>";
var_dump($objM->equals($objM1));
echo "<br>";
var_dump($objM->add($objM1));





