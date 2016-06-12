<?php

namespace Xtuc\CookieLawBundle\Services;

use Xtuc\CookieLawBundle\Protocol\CookieLawProvider;
use Symfony\Component\HttpFoundation\ParameterBag;

class CookieBarProvider implements CookieLawProvider
{
    public function getCookieName()
    {
        return "cookiebar";
    }

    public function isAllowed(ParameterBag $cookies)
    {
        return $cookies->has($this->getCookieName())
                && $cookies->get($this->getCookieName()) === "CookieAllowed";
    }
}
