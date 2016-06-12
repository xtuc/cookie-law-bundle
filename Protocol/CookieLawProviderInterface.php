<?php

namespace Xtuc\CookieLawBundle\Protocol;

use Symfony\Component\HttpFoundation\ParameterBag;

interface CookieLawProvider {
    public function isAllowed(ParameterBag $cookies);
    public function getCookieName();
}
