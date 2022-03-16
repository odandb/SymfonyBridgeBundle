<?php

namespace LightSaml\SymfonyBridgeBundle\Bridge\Store\Request;

use LightSaml\Store\Request\RequestStateSessionStore as BaseRequestStateSessionStore;
use Symfony\Component\HttpFoundation\RequestStack;

class RequestStateSessionStore extends BaseRequestStateSessionStore
{
    public function __construct(RequestStack $requestStack, $requestStateId, $prefix = 'saml_request_state_')
    {
        parent::__construct($requestStack->getSession(), $requestStateId, $prefix);
    }
}
