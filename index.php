<?php

require_once 'src/Products/SmallProduct.php';
require_once 'src/Products/LargeProduct.php';
require_once 'src/Basket.php';
require_once 'src/Users/Customer.php';
require_once 'src/Users/Business.php';


$hat = new SmallProduct('Hat', 'Lovely hat', 10, 10, 10);
$shoes = new SmallProduct('Shoes', 'Red shoes', 86.99, 10);
$shed = new LargeProduct('Shed', 'Huge shed', 1400, 100, 200, 100);

$customer = new Customer('Keith', 'Smith', '123 street', 'ab123cd', 'keith@keith.com');
$business = new Business('Keith', 'Smith', '123 street', 'ab123cd', 'keith@keithcorp.com', 'Keith Corp', '1234');

$customerBasket = new Basket($customer);
$businessBasket = new Basket($business);

$customerBasket->addProduct($hat);
$customerBasket->addProduct($shoes);
$customerBasket->addProduct($shed);
$customerBasket->removeProduct($shoes);

$businessBasket->addProduct($hat);
$businessBasket->addProduct($shoes);

echo $customerBasket->display();
echo 'Products: ' . $customerBasket->getProductsPrice() . '<br />';
echo 'Shipping: ' . $customerBasket->getShippingPrice() . '<br />';
echo 'Total: ' . $customerBasket->getTotalPrice();

echo $businessBasket->display();
echo 'Products: ' . $businessBasket->getProductsPrice() . '<br />';
echo 'Shipping: ' . $businessBasket->getShippingPrice() . '<br />';
echo 'Total: ' . $businessBasket->getTotalPrice();


