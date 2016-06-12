<?php

namespace Xtuc\CookieLawBundle\Services;

use Symfony\Component\HttpFoundation\ParameterBag;

class TestService
{
    CONST ALLOWED_VALUE = "CookieAllowed";
    CONST COOKIE = "cookiebar";

    public function isAllowed(ParameterBag $cookies)
    {
        return $cookies->has(self::COOKIE)
                && $cookies->get(self::COOKIE) === self::ALLOWED_VALUE;
    }
}
