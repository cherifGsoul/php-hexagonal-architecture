<?php

namespace Taxation\Model;

interface PricedProducts
{
    /**
     * @param $argument1
     * @return mixed
     */
    public function forName(string $name): Product;
}
