<?php

require_once 'src/Interfaces/Displayable.php';

abstract class Product implements Displayable
{
    protected string $title;
    protected string $description;
    protected float $price;
    // int|false is a union type - it means $discount can be either an integer or false
    protected int|false $discount;


    public function __construct(string $title, string $description, float $price, false|int $discount = false)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDiscountedPrice(): float
    {
        if ($this->discount) {
            return $this->price - ($this->price * ($this->discount / 100));
        }

        return $this->price;
    }

    public function display(): string
    {
        if ($this->discount) {
            return "<div class=\"product\">
                        <h3>$this->title</h3>
                        <span class=\"old-price\">£$this->price</span>
                        <span class=\"discount\">$this->discount% discount - £{$this->getDiscountedPrice()}</span>
                        <p>$this->description</p>
                    </div>";
        }

        return "<div class=\"product\">
                    <h3>$this->title</h3>
                    <span>£$this->price</span>
                    <p>$this->description</p>
                </div>";
    }

    public function basketDisplay(int $qty = 1): string
    {
        if ($this->discount) {

            return " <li>$this->title - £{$this->getDiscountedPrice()} - qty: $qty</li>";
        }

        return " <li>$this->title - £$this->price - qty: $qty</li>";
    }

    abstract public function getShippingCost(): float;
}