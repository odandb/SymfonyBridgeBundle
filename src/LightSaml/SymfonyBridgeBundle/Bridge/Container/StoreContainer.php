<?php

/*
 * This file is part of the LightSAML Symfony Bridge Bundle package.
 *
 * (c) Milos Tomic <tmilos@lightsaml.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LightSaml\SymfonyBridgeBundle\Bridge\Container;

use LightSaml\Build\Container\StoreContainerInterface;
use LightSaml\Store\Id\IdStoreInterface;
use LightSaml\Store\Request\RequestStateStoreInterface;
use LightSaml\Store\Sso\SsoStateStoreInterface;

class StoreContainer implements StoreContainerInterface
{
    private RequestStateStoreInterface $requestStateStore;

    private IdStoreInterface $idStateStore;

    private SsoStateStoreInterface $ssoStateStore;

    public function __construct(
        RequestStateStoreInterface $requestStateStore,
        IdStoreInterface $idStateStore,
        SsoStateStoreInterface $ssoStateStore
    ) {
        $this->requestStateStore = $requestStateStore;
        $this->idStateStore = $idStateStore;
        $this->ssoStateStore = $ssoStateStore;
    }

    public function getRequestStateStore(): RequestStateStoreInterface
    {
        return $this->requestStateStore;
    }

    public function getIdStateStore(): IdStoreInterface
    {
        return $this->idStateStore;
    }

    public function getSsoStateStore(): SsoStateStoreInterface
    {
        return $this->ssoStateStore;
    }
}
