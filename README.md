# Cookie law bundle

## Known issues

* Can't intercept cookie issued by sub-requests (FOSUserbundle in my tests)

## Provider

The provider contains the rules to allow cookie creations.

```php
<?php

interface CookieLawProvider {
    public function isAllowed(\Symfony\Component\HttpFoundation\ParameterBag $cookies): Boolean;
    public function getCookieName(): String;
}
```

The law focus only on identifing cookies. Anonymous cookies used for cookie-based routing can be whitelisted.
