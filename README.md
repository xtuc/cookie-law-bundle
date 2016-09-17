# Cookie law bundle

This is a proof of concept. Symfony2 sends cookies by default, which is not allowed in the EU Cookie law.

## Known issues

* Can't intercept cookie issued by sub-requests (FOSUserbundle in my tests)

## Provider

The provider contains the rules to allow cookie creation.

```php
<?php

interface CookieLawProvider {
    public function isAllowed(\Symfony\Component\HttpFoundation\ParameterBag $cookies): Boolean;
    public function getCookieName(): String;
}
```

The law focus only on identifing cookies. Anonymous cookies, used for cookie-based routing for example, can be whitelisted.
