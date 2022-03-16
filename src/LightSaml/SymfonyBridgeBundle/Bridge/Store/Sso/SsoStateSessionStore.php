<?php

namespace LightSaml\SymfonyBridgeBundle\Bridge\Store\Sso;

use LightSaml\Store\Sso\SsoStateSessionStore as BaseSsoStateSessionStore;
use Symfony\Component\HttpFoundation\RequestStack;

class SsoStateSessionStore extends BaseSsoStateSessionStore
{
    public function __construct(RequestStack $requestStack, $key)
    {
        parent::__construct($requestStack->getSession(), $key);
    }
}
