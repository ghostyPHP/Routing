<?php

namespace Ghosty\Component\Routing\Contracts\Stacks;

use Ghosty\Component\Stack\Contracts\AbstractStackContract;

interface RouteStackContract extends AbstractStackContract
{
    /**
     * @param  \Ghosty\Component\Routing\Contracts\RouteContract $route
     */
    public function push(mixed $route): static;

    /**
     * @return \Ghosty\Component\Routing\Contracts\RouteContract
     */
    public function pop(): mixed;

    /**
     * @return \Ghosty\Component\Routing\Contracts\RouteContract
     */
    public function top(): mixed;
}
