<?php

namespace Ghosty\Component\Routing\Exceptions;

class RouteNotFoundException extends \Exception
{
    public function __construct(string $route)
    {
        parent::__construct("Route $route not found!");
    }
}
