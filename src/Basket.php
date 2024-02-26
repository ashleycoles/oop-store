<?php

require_once 'src/Products/Product.php';
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
        if (!$this->productIsInBasket($product)) {
            $this->products[$product->getTitle()] = [
                'product' => $product,
                'qty' => 1
            ];
        } else {
            $this->products[$product->getTitle()]['qty']++;
        }
    }

    public function removeProduct(Product $product): bool
    {
        if (!$this->productIsInBasket($product)) {
            return false;
        }

        if ($this->products[$product->getTitle()]['qty'] === 1) {
            unset($this->products[$product->getTitle()]);
            return true;
        }

        $this->products[$product->getTitle()]['qty']--;
        return true;
    }

    public function display(): string
    {
        $output = '<ul>';
        foreach($this->products as $product) {
            $output .= $product['product']->basketDisplay($product['qty']);
        }
        $output .= '</ul>';

        return $output;
    }

    public function getProductsPrice(): float
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total += ($product['product']->getDiscountedPrice() * $product['qty']);
        }
        // If a customer does not have a VAT number, then we need to add 20% onto the total
        if (!isset($this->customer->vatNumber)) {
            $total *= 1.2;
        }

        return $total;
    }

    public function getShippingPrice(): float
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total += ($product['product']->getShippingCost() * $product['qty']);
        }

        return $total;
    }

    public function getTotalPrice(): float
    {
        return $this->getProductsPrice() + $this->getShippingPrice();
    }

    protected function productIsInBasket(Product $product): bool
    {
        return isset($this->products[$product->getTitle()]);
    }
}
