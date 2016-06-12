# Cookie law bundle

This is a proof of concept. In my case Symfony2 (FOSUserBundle precisly) sends session cookies without any control which is not allowed according the EU Cookie law.

## Known issues

* Can't intercept cookie issued by sub-requests (FOSUserbundle in my tests)

## Provider

The provider contains the rules to allowing cookie creation.

```php
<?php

interface CookieLawProvider {
    public function isAllowed(\Symfony\Component\HttpFoundation\ParameterBag $cookies): Boolean;
    public function getCookieName(): String;
}
```

The law focus only on identifing cookies. Anonymous cookies used for cookie-based routing can be whitelisted.
