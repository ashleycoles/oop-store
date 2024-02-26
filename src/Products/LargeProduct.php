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
}