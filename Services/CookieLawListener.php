<?php

namespace Xtuc\CookieLawBundle\Services;

use Symfony\Component\HttpFoundation\ParameterBag;
use \Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use \Symfony\Component\HttpFoundation\RequestStack;
use \Symfony\Component\HttpFoundation\Cookie;
use Xtuc\CookieLawBundle\Protocol\CookieLawProvider;

class CookieLawListener
{
    protected $provider;

    public function __construct(CookieLawProvider $provider)
    {
        $this->provider = $provider;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        $headers = $response->headers;

        $isAllowed = $service->isAllowed($request->cookies);

        foreach($headers->getCookies() as $cookie) {

            if (!$isAllowed) {
                $response->headers->removeCookie($cookie->getName());
            }
        }
    }
}
