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

use LightSaml\Build\Container\ProviderContainerInterface;
use LightSaml\Provider\Attribute\AttributeValueProviderInterface;
use LightSaml\Provider\NameID\NameIdProviderInterface;
use LightSaml\Provider\Session\SessionInfoProviderInterface;

class ProviderContainer implements ProviderContainerInterface
{
    private AttributeValueProviderInterface $attributeValueProvider;

    private SessionInfoProviderInterface $sessionInfoProvider;

    private NameIdProviderInterface $nameIdProvider;

    public function __construct(
        AttributeValueProviderInterface $attributeValueProvider,
        SessionInfoProviderInterface $sessionInfoProvider,
        NameIdProviderInterface $nameIdProvider
    ) {
        $this->attributeValueProvider = $attributeValueProvider;
        $this->sessionInfoProvider = $sessionInfoProvider;
        $this->nameIdProvider = $nameIdProvider;
    }

    public function getAttributeValueProvider(): AttributeValueProviderInterface
    {
        return $this->attributeValueProvider;
    }

    public function getSessionInfoProvider(): SessionInfoProviderInterface
    {
        return $this->sessionInfoProvider;
    }

    public function getNameIdProvider(): NameIdProviderInterface
    {
        return $this->nameIdProvider;
    }
}
