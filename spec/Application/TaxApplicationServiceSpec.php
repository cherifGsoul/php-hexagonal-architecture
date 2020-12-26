<?php

namespace spec\Taxation\Application;

use PhpSpec\ObjectBehavior;
use Taxation\Application\Command\TaxationCommand;
use Taxation\Application\ApplicationService;
use Taxation\Model\Cost;
use Taxation\Model\Product;
use Taxation\Model\PricedProducts;
use Taxation\Model\TaxCalculator;
use Taxation\Model\TaxedCategory;
use Taxation\Model\Tax;
use TaxCalculator\Application\TaxApplicationService;

class TaxApplicationServiceSpec extends ObjectBehavior
{
    public function let(PricedProducts $pricedProducts, TaxCalculator $taxCalculator)
    {
        $this->beConstructedWith($pricedProducts, $taxCalculator);
    }

    function it_implements_input_port()
    {
        $this->shouldImplement(ApplicationService::class);
    }

    function it_calculate_tax_for_a_product_in_category(PricedProducts $pricedProducts, TaxCalculator $taxCalculator)
    {
        $this->beConstructedWith($pricedProducts, $taxCalculator);

        $command = new TaxationCommand('Computer mouse');

        $taxedCategory = TaxedCategory::namedAndTaxed('Computer stuff', .29);

        $product = Product::CategorizedWithCost('Computer mouse', $taxedCategory, 1000.00);

        $pricedProducts->forName('Computer mouse')->willReturn($product);

        $taxCalculator->calculateTaxFor($product)->willReturn(1290.00);

        $this->execute($command)->shouldReturn(1290.00);
    }
}
