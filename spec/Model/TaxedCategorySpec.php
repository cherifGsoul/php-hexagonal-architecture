<?php

namespace spec\Taxation\Model;

use PhpSpec\ObjectBehavior;
use Taxation\Model\TaxedCategory;

class TaxedCategorySpec extends ObjectBehavior
{
    function it_represents_category_with_tax()
    {
        $this->beConstructedThrough('namedAndTaxed', ['Computer stuff', .29]);
        $this->getName()->shouldReturn('Computer stuff');
        $this->getTaxRate()->shouldReturn(.29);
    }
}