<?php

namespace Taxation\Model;

class TaxedCategory
{
    private string $name;
    private float $taxRate;

    /**
     * TaxedCategory constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param string $name
     * @param float $taxRate
     * @return static
     */
    public static function namedAndTaxed(string $name, float $taxRate): self
    {
        $taxedCategory = new TaxedCategory();
        $taxedCategory->name = $name;
        $taxedCategory->taxRate = $taxRate;
        return $taxedCategory;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }
}
