<?php


namespace Taxation\Application\Command;


class TaxationCommand
{
    /**
     * @var string
     */
    public string $product;

    /**
     * TaxationCommand constructor.
     * @param string $product
     */
    public function __construct(string $product)
    {
        $this->product = $product;
    }
}