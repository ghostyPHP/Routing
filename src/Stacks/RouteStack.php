<?php

namespace Ghosty\Component\Routing\Stacks;

use Ghosty\Component\Routing\Contracts\RouteContract;
use Ghosty\Component\Routing\Contracts\Stacks\RouteStackContract;
use Ghosty\Component\Routing\Route;
use Ghosty\Component\Stack\AbstractStack;

class RouteStack extends AbstractStack implements RouteStackContract
{


    public function push(mixed $route): void
    {
        if (!($route instanceof RouteContract))
        {
            throw new \RuntimeException('Route must be type of \Ghosty\Component\Routing\Contracts\RouteContract');
        }
    }
}
