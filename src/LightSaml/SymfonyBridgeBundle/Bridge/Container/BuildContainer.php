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

use LightSaml\Build\Container\BuildContainerInterface;
use LightSaml\Build\Container\CredentialContainerInterface;
use LightSaml\Build\Container\OwnContainerInterface;
use LightSaml\Build\Container\PartyContainerInterface;
use LightSaml\Build\Container\ProviderContainerInterface;
use LightSaml\Build\Container\ServiceContainerInterface;
use LightSaml\Build\Container\StoreContainerInterface;
use LightSaml\Build\Container\SystemContainerInterface;

class BuildContainer implements BuildContainerInterface
{
    private SystemContainerInterface $systemsystemContainer;

    private PartyContainerInterface $partypartyContainer;

    private StoreContainerInterface $storeContainer;

    private OwnContainerInterface $ownContainer;

    private ProviderContainerInterface $providerContainer;

    private ServiceContainerInterface $serviceContainer;

    private CredentialContainerInterface $credentialContainer;

    public function __construct(
        SystemContainerInterface $systemContainer,
        PartyContainerInterface $partyContainer,
        StoreContainerInterface $storeContainer,
        ProviderContainerInterface $providerContainer,
        CredentialContainerInterface $credentialContainer,
        ServiceContainerInterface $serviceContainer,
        OwnContainerInterface $ownContainer
    ) {
        $this->systemsystemContainer = $systemContainer;
        $this->partypartyContainer = $partyContainer;
        $this->storeContainer = $storeContainer;
        $this->providerContainer = $providerContainer;
        $this->credentialContainer = $credentialContainer;
        $this->serviceContainer = $serviceContainer;
        $this->ownContainer = $ownContainer;
    }

    public function getSystemContainer(): SystemContainerInterface
    {
        return $this->systemsystemContainer;
    }

    public function getPartyContainer(): PartyContainerInterface
    {
        return $this->partypartyContainer;
    }

    public function getStoreContainer(): StoreContainerInterface
    {
        return $this->storeContainer;
    }

    public function getProviderContainer(): ProviderContainerInterface
    {
        return $this->providerContainer;
    }

    public function getCredentialContainer(): CredentialContainerInterface
    {
        return $this->credentialContainer;
    }

    public function getServiceContainer(): ServiceContainerInterface
    {
        return $this->serviceContainer;
    }

    public function getOwnContainer(): OwnContainerInterface
    {
        return $this->ownContainer;
    }
}
