<?php

namespace Taxation\Model;

class Product
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var TaxedCategory
     */
    private TaxedCategory $category;

    /**
     * @var float
     */
    private float $cost;

    private function __construct()
    {
    }

    public static function categorizedWithCost(string $name, TaxedCategory $category, float $cost)
    {
        $product = new Product();

        $product->name = $name;
        $product->category = $category;
        $product->cost = $cost;

        return $product;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return TaxedCategory
     */
    public function getCategory(): TaxedCategory
    {
        return $this->category;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @return float
     */
    public function getCategoryTaxRate()
    {
        return $this->getCategory()->getTaxRate();
    }

    /**
     * @param TaxCalculator $taxCalculator
     * @return float
     */
    public function taxedCost(TaxCalculator $taxCalculator)
    {
        return $taxCalculator->calculateTaxFor($this);
    }
}
