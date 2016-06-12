<?php

namespace Xtuc\CookieLawBundle\Services;

use Symfony\Component\HttpFoundation\ParameterBag;
use \Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use \Symfony\Component\HttpFoundation\RequestStack;
use \Symfony\Component\HttpFoundation\Cookie;

class CookieLawService
{
    private $isAllowed = false;

    public function __construct(/*CookieLawInterface*/ $service, RequestStack $requestStack)
    {

    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        $headers = $response->headers;

        $this->isAllowed = $service->isAllowed($request->cookies);

        $initialCookieCount = count($headers->getCookies());

        foreach($headers->getCookies() as $cookie) {
            if (!$this->isAllowed) {
                $response->headers->removeCookie($cookie->getName());
            }
        }

        dump($headers->getCookies());

        echo $initialCookieCount - count($headers->getCookies()) . " cookie(s) has been denied";
    }

    /**
     * @deprecated
     */
    public function reducer(array $cookies, Cookie $cookie)
    {
        if ($this->isAllowed) {
            $cookies[] = $cookie;
        }

        return $cookies;
    }
}
