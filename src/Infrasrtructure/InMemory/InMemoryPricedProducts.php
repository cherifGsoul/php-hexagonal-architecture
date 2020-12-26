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
            'mouse' => Product::categorizedWithCost('mouse', TaxedCategory::namedAndTaxed(.29)),
            'mouse' => Product::categorizedWithCost('monitor', TaxedCategory::namedAndTaxed(.29)),
            'perfume' => Product::categorizedWithCost('perfume', TaxedCategory::namedAndTaxed('Computer stuff', .15), 18000.00),
        ];
    }

    public function forName(string $name): Product
    {
        return $this->products[$name];
    }
}