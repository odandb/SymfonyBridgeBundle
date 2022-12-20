<?php

/*
 * This file is part of the LightSAML Symfony Bridge Bundle package.
 *
 * (c) Milos Tomic <tmilos@lightsaml.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LightSaml\SymfonyBridgeBundle\Bridge\Store\Sso;

use LightSaml\Store\Sso\SsoStateSessionStore as BaseSsoStateSessionStore;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SsoStateSessionStore extends BaseSsoStateSessionStore
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack, $key)
    {
        $this->requestStack = $requestStack;

        parent::__construct(null, $key);
    }

    protected function getSession(): SessionInterface
    {
        return $this->requestStack->getSession();
    }
}
