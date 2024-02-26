<?php


class Product
{
    protected string $title;
    protected string $description;
    protected float $price;

    public function __construct(string $title, string $description, float $price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }

    public function display(): string
    {
        return "<div class=\"product\">
                    <h3>$this->title</h3>
                    <span>£$this->price</span>
                    <p>$this->description</p>
                </div>";
    }
}