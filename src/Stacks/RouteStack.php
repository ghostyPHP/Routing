<?php

namespace Ghosty\Component\Routing\Stacks;

use Ghosty\Component\Routing\Contracts\Stacks\RouteStackContract;
use Ghosty\Component\Routing\Route;
use Ghosty\Component\Stack\AbstractStack;

class RouteStack extends AbstractStack implements RouteStackContract
{
    public function pushRoute(Route $route): void
    {
        $this->push($route);
    }

    public function popRoute(): Route
    {
        return $this->pop();
    }


    public function topRoute(): Route
    {
        return $this->top();
    }
}
