<?php

require_once 'src/Product.php';
require_once 'src/Basket.php';

$hat = new Product('Hat', 'Lovely hat', 10, 10);
$shoes = new Product('Shoes', 'Red shoes', 86.99);

$basket = new Basket('Keith');

$basket->addProduct($hat);
$basket->addProduct($shoes);

echo $basket->display();