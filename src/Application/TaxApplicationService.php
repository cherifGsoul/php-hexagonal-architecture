<?php

namespace Taxation\Application;

use Taxation\Model\PricedProducts;
use Taxation\Model\Product;
use Taxation\Model\TaxCalculator;

class TaxApplicationService implements ApplicationService
{
    private PricedProducts  $pricedProducts;
    private TaxCalculator   $taxCalculator;

    public function __construct(PricedProducts $pricedProducts, TaxCalculator $taxCalculator)
    {
        $this->pricedProducts   = $pricedProducts;
        $this->taxCalculator    = $taxCalculator;
    }

    public function execute(object $command)
    {
        /** @var Product $product */
        $product = $this->pricedProducts->forName($command->product);
        return [
            'product' => $product->getName(),
            'product_cost' => $product->getCost(),
            'product_category_tax' => $product->getCategoryTaxRate(),
            'product_taxed_cost' => $product->taxedCost($this->taxCalculator),
        ];
    }
}
