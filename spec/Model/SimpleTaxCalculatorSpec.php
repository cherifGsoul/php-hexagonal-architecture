<?php

namespace spec\Taxation\Model;

use PhpSpec\ObjectBehavior;
use Taxation\Model\Product;
use Taxation\Model\TaxedCategory;

class SimpleTaxCalculatorSpec extends ObjectBehavior
{
    function it_calculate_tax_for_a_product_in_category()
    {
        $taxedCategory = TaxedCategory::namedAndTaxed('Computer stuff', .29);
        $product = Product::categorizedWithCost('Computer mouse', $taxedCategory, 1000.00);
        $this->calculateTaxFor($product)->shouldReturn(1290.00);
    }
}
