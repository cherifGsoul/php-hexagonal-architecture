<?php

namespace Taxation\Model;

interface PricedProducts
{
    /**
     * @param $name
     * @return mixed
     */
    public function forName(string $name): Product;
}
