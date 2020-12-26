<?php


namespace Taxation\Infrastructure\InMemory;


use Taxation\Model\PricedProducts;
use Taxation\Model\Product;
use Taxation\Model\TaxedCategory;

class InMemoryPricedProducts implements PricedProducts
{
    private array $products = [];

    public function __construct()
    {
        $this->products = [
            'mouse' => Product::categorizedWithCost('mouse', TaxedCategory::namedAndTaxed('Computer stuff', .29), 1000.00),
            'monitor' => Product::categorizedWithCost('monitor', TaxedCategory::namedAndTaxed('Computer stuff', .29), 37200.00),
            'parfume' => Product::categorizedWithCost('parfume', TaxedCategory::namedAndTaxed('Computer stuff', .15), 18000.00),
        ];
    }

    /**
     * @param string $name
     * @return Product
     */
    public function forName(string $name): Product
    {
        return $this->products[$name];
    }
}