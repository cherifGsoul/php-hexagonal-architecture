<?php

namespace spec\Taxation\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Taxation\Model\Product;
use Taxation\Model\SimpleTaxCalculator;
use Taxation\Model\TaxCalculator;
use Taxation\Model\TaxedCategory;

class ProductSpec extends ObjectBehavior
{
    function it_represents_categorized_product_with_cost()
    {
        $taxedCategory = TaxedCategory::namedAndTaxed('Computer stuff', .29);
        $this->beConstructedThrough('categorizedWithCost', ['Computer mouse', $taxedCategory, 1000.00]);
        $this->getName()->shouldReturn('Computer mouse');
        $this->getCategory()->shouldReturn($taxedCategory);
        $this->getCost()->shouldReturn(1000.00);
    }

    function it_uses_tax_calculator_for_taxed_cost(TaxCalculator $taxCalculator)
    {
        $taxedCategory = TaxedCategory::namedAndTaxed('Computer stuff', .29);
        $this->beConstructedThrough('categorizedWithCost', ['Computer mouse', $taxedCategory, 1000.00]);
        $taxCalculator->calculateTaxFor(Argument::type(Product::class))->willReturn(1290.00);
        $taxCalculator->calculateTaxFor(Argument::type(Product::class))->shouldBeCalled();
        $this->taxedCost($taxCalculator)->shouldReturn(1290.00);

    }
}
