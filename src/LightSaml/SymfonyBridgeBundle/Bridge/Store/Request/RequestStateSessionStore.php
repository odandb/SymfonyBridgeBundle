<?php

/*
 * This file is part of the LightSAML Symfony Bridge Bundle package.
 *
 * (c) Milos Tomic <tmilos@lightsaml.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LightSaml\SymfonyBridgeBundle\Bridge\Store\Request;

use LightSaml\Store\Request\RequestStateSessionStore as BaseRequestStateSessionStore;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RequestStateSessionStore extends BaseRequestStateSessionStore
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack, $requestStateId, $prefix = 'saml_request_state_')
    {
        $this->requestStack = $requestStack;

        parent::__construct(null, $requestStateId, $prefix);
    }

    protected function getSession(): SessionInterface
    {
        return $this->requestStack->getSession();
    }
}
