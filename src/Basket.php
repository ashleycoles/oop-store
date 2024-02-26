<?php

require_once 'src/Product.php';
require_once 'src/Interfaces/Displayable.php';

class Basket implements Displayable {
    protected User $customer;
    protected array $products;

    public function __construct(User $customer)
    {
        $this->customer = $customer;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function display(): string
    {
        $output = '<ul>';
        foreach($this->products as $product) {
            $output .= $product->basketDisplay();
        }
        $output .= '</ul>';

        return $output;
    }

    public function getProductsPrice(): float
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total += $product->getDiscountedPrice();
        }
        // If a customer does not have a VAT number, then we need to add 20% onto the total
        if (!isset($this->customer->vatNumber)) {
            $total *= 1.2;
        }

        return $total;
    }
}
