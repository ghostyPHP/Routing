<?php

namespace Ghosty\Component\Routing\Contracts;

use Ghosty\Component\Routing\Contracts\Bags\MiddlewareBagContract;
use Ghosty\Component\Routing\Contracts\Bags\ParameterBagContract;
use Ghosty\Component\Routing\Contracts\Bags\UrlBagContract;

interface RouteContract
{
    public function getUrl(): string;

    public function setUrl(string $url): void;

    public function getMethod(): string;

    public function setMethod(string $method): void;

    public function getController(): string;

    public function setController(string $controller): void;

    public function getAction(): string;

    public function setAction(string $action): void;

    public function getParametersBag(): ParameterBagContract;

    public function setParametersBag(ParameterBagContract $parameterBag): void;

    public function getMiddlewaresBag(): MiddlewareBagContract;

    public function setMiddlewaresBag(MiddlewareBagContract $middlewareBag): void;

    public function getUrlBag(): UrlBagContract;

    public function setUrlBag(UrlBagContract $urlBag): void;
}
