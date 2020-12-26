<?php


namespace Taxation\Infrasrtructure\InMemory;


use Taxation\Model\PricedProducts;
use Taxation\Model\Product;
use Taxation\Model\TaxedCategory;

class InMemoryPricedProducts implements PricedProducts
{
    private array $products = [];

    public function __construct()
    {
        $this->products = [
            'Mouse' => Product::categorizedWithCost('Mouse', TaxedCategory::namedAndTaxed(.29)),
            'Monitor' => Product::categorizedWithCost('Monitor', TaxedCategory::namedAndTaxed(.29)),
        ];
    }

    public function forName(string $name): Product
    {
        return $this->products[$name];
    }
}