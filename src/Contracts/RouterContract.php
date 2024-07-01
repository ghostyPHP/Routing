<?php

namespace Ghosty\Component\Routing\Contracts;

use Ghosty\Component\Bag\Contracts\AbstractBagContract;
use Ghosty\Component\Bag\Contracts\BagContract;
use Ghosty\Component\HttpFoundation\Contracts\Bags\ParameterBagContract;

interface RouterContract
{
    public function getAttributes(): BagContract;

    public function getCurrentRoute(): RouteContract;
}
