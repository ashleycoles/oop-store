<?php

require_once 'src/Product.php';

$hat = new Product('Hat', 'Lovely hat', 10);
$shoes = new Product('Shoes', 'Red shoes', 86.99);

echo $hat->display();
echo $shoes->display();