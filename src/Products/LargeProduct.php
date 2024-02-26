<?php

require_once 'src/Products/Product.php';

class LargeProduct extends Product
{
    protected float $width;
    protected float $height;
    protected float $depth;

    public function __construct(string $title, string $description, float $price, float $width, float $height, float $depth, false|int $discount = false)
    {
        parent::__construct($title, $description, $price, $discount);
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
    }

    public function getShippingCost(): float
    {
        if ($this->price > 10000) {
            return 0;
        }

        if ($this->width < 200 && $this->height < 200 && $this->depth < 200) {
            return 150;
        }

        if ($this->width > 500 || $this->height > 500 || $this->depth > 500) {
            return 600;
        }

        return 200;

    }
}