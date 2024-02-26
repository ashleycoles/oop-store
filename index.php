<?php

require_once 'src/Product.php';
require_once 'src/Basket.php';
require_once 'src/Users/Customer.php';
require_once 'src/Users/Business.php';


$hat = new Product('Hat', 'Lovely hat', 10, 10);
$shoes = new Product('Shoes', 'Red shoes', 86.99);

$customer = new Customer('Keith', 'Smith', '123 street', 'ab123cd', 'keith@keith.com');
$business = new Business('Keith', 'Smith', '123 street', 'ab123cd', 'keith@keithcorp.com', 'Keith Corp', '1234');

$customerBasket = new Basket($customer);
$businessBasket = new Basket($business);

$customerBasket->addProduct($hat);
$customerBasket->addProduct($shoes);

$businessBasket->addProduct($hat);
$businessBasket->addProduct($shoes);

echo $customerBasket->display();
echo $businessBasket->display();

echo $customer->getAddress();
echo $business->getAddress();