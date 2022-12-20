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

use LightSaml\Build\Container\OwnContainerInterface;
use LightSaml\Credential\CredentialInterface;
use LightSaml\Provider\EntityDescriptor\EntityDescriptorProviderInterface;
use LightSaml\Store\Credential\CredentialStoreInterface;

class OwnContainer implements OwnContainerInterface
{
    private EntityDescriptorProviderInterface $entityDescriptorProvider;

    private CredentialStoreInterface $credentialStore;

    private string $entityId;

    public function __construct(
        EntityDescriptorProviderInterface $entityDescriptorProvider,
        CredentialStoreInterface $credentialStore,
        string $entityId
    ) {
        $this->entityDescriptorProvider = $entityDescriptorProvider;
        $this->credentialStore = $credentialStore;
        $this->entityId = $entityId;
    }

    public function getOwnEntityDescriptorProvider(): EntityDescriptorProviderInterface
    {
        return $this->entityDescriptorProvider;
    }

    /**
     * @return CredentialInterface[]
     */
    public function getOwnCredentials(): array
    {
        return $this->credentialStore->getByEntityId(
            $this->entityId
        );
    }
}
