<?php

require_once 'src/Products/Product.php';

class SmallProduct extends Product
{
    protected float $weight;

    public function __construct(string $title, string $description, float $price, float $weight, false|int $discount = false)
    {
        parent::__construct($title, $description, $price, $discount);
        $this->weight = $weight;
    }

}