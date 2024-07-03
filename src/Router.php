<?php

namespace Ghosty\Component\Routing;

use Ghosty\Component\Bag\Bag;
use Ghosty\Component\Bag\Contracts\BagContract;
use Ghosty\Component\HttpFoundation\Contracts\RequestContract;
use Ghosty\Component\Routing\Contracts\RouteContract;
use Ghosty\Component\Routing\Contracts\RouterContract;
use Ghosty\Component\Routing\Contracts\Stacks\RouteStackContract;
use Ghosty\Component\Routing\Exceptions\RouteNotFoundException;

class Router implements RouterContract
{
    private RequestContract $requestContext;

    private RouteStackContract $routeStack;

    private RouteContract $currentRoute;


    public function __construct(RequestContract $requestContext, RouteStackContract $routeStack)
    {
        $this->requestContext = $requestContext;
        $this->routeStack = $routeStack;

        $this->currentRoute = $this->getCurrent();
    }

    private function getCurrent()
    {
        while (true)
        {
            if (!$this->routeStack->isEmpty())
            {
                $route = $this->routeStack->pop();
                if ($this->validate($route))
                {
                    return $route;
                }
            }
            else
            {
                break;
            }
        }

        throw new RouteNotFoundException($this->requestContext->getRequestUri());
    }

    private function validate(RouteContract $route): bool
    {
        return $this->validateByMethod($route) && $this->validateByUri($route);
    }

    private function validateByUri(RouteContract $route): bool
    {

        $splitedUrl = explode('/', substr($this->requestContext->getRequestUri(), 1));
        $splitedRouteUrl = $route->getUrlBag()->all();

        if (count($splitedUrl) != count($splitedRouteUrl))
        {
            return false;
        }


        foreach ($splitedRouteUrl as $splitedRouteUrlKey => $splitedRouteUrlEl)
        {
            if (in_array($splitedRouteUrlEl, $route->getParametersBag()->all()))
            {
                continue;
            }

            if ($splitedUrl[$splitedRouteUrlKey] != $splitedRouteUrlEl)
            {
                return false;
            }
        }

        return true;
    }

    private function validateByMethod(RouteContract $route): bool
    {
        return $this->requestContext->getMethod() === $route->getMethod();
    }

    public function getAttributes(): BagContract
    {
        $attributesBag = new Bag([]);
        $attributes = $this->currentRoute->getParametersBag()->all();
        $routeUrlArray = $this->currentRoute->getUrlBag()->all();
        foreach ($attributes as $key => $value)
        {
            foreach ($routeUrlArray as $routeKey => $routeUrlArrayEl)
            {
                if ($value === $routeUrlArrayEl)
                {
                    $attributesBag->add($value, explode('/', substr($this->requestContext->getRequestUri(), 1))[$routeKey]);
                }
            }
        }

        return $attributesBag;
    }

    public function getCurrentRoute(): RouteContract
    {
        return $this->currentRoute;
    }
}
