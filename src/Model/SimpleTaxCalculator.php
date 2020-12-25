<?php

namespace Taxation\Model;

class SimpleTaxCalculator implements TaxCalculator
{
    /**
     * @inheritDoc
     */
    public function calculateTaxFor(Product $product): float
    {
        return $product->getCost() + ($product->getCost() * $product->getCategoryTaxRate());
    }
}
