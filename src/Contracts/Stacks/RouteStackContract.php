<?php

namespace Ghosty\Component\Routing\Contracts\Stacks;

use Ghosty\Component\Routing\Route;
use Ghosty\Component\Stack\Contracts\AbstractStackContract;

interface RouteStackContract extends AbstractStackContract
{
    public function pushRoute(Route $route): void;

    public function popRoute(): Route;

    public function topRoute(): Route;
}
