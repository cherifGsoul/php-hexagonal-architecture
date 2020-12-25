<?php

namespace Taxation\Model;

interface TaxCalculator
{
    /**
     * @param Product $product
     * @return float
     */
    public function calculateTaxFor(Product $product): float;
}
