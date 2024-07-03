<?php

namespace Ghosty\Component\Routing\Exceptions;

class RouteNotFoundException extends \Exception
{
    public function __construct(string $route, string $method)
    {
        parent::__construct("Route $route with $method method not found.");
    }
}
