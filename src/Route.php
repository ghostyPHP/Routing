<?php

namespace Ghosty\Component\Routing;

use Ghosty\Component\Routing\Bags\UrlBag;
use Ghosty\Component\Routing\Contracts\Bags\MiddlewareBagContract;
use Ghosty\Component\Routing\Contracts\Bags\ParameterBagContract;
use Ghosty\Component\Routing\Contracts\Bags\UrlBagContract;
use Ghosty\Component\Routing\Contracts\RouteContract;

class Route implements RouteContract
{
    private string $method;

    private string $url;

    private string $controller;

    private string $action;

    private ParameterBagContract $parameters;

    private MiddlewareBagContract $middlewares;

    private UrlBagContract $urlBag;


    public function __construct(string $method, string $url, string $controller, string $action, ParameterBagContract $parameters, MiddlewareBagContract $middlewares)
    {
        $this->setMethod($method);
        $this->setUrl($url);
        $this->setController($controller);
        $this->setAction($action);
        $this->setParametersBag($parameters);
        $this->setMiddlewaresBag($middlewares);
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = substr(trim($url), 1);

        $this->setUrlBag(new UrlBag(explode('/', $this->getUrl())));
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    public function getParametersBag(): ParameterBagContract
    {
        return $this->parameters;
    }

    public function setParametersBag(ParameterBagContract $parameterBag): void
    {
        $this->parameters = $parameterBag;
    }

    public function getMiddlewaresBag(): MiddlewareBagContract
    {
        return $this->middlewares;
    }

    public function setMiddlewaresBag(MiddlewareBagContract $middlewareBag): void
    {
        $this->middlewares = $middlewareBag;
    }

    public function getUrlBag(): UrlBagContract
    {
        return $this->urlBag;
    }

    public function setUrlBag(UrlBagContract $urlBag): void
    {
        $this->urlBag = $urlBag;
    }
}
