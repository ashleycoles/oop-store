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

    public function getShippingCost(): float
    {
        if ($this->price > 100) {
            return 0;
        }

        if ($this->weight < 10) {
            return 1.99;
        }

        if ($this->weight < 50) {
            return 4.99;
        }

        return 7.99;
    }
}