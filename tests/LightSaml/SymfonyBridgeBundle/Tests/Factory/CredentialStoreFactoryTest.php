<?php

namespace LightSaml\SymfonyBridgeBundle\Tests\Factory;

use LightSaml\Credential\CredentialInterface;
use LightSaml\Store\Credential\CredentialStoreInterface;
use LightSaml\Store\EntityDescriptor\EntityDescriptorStoreInterface;
use LightSaml\SymfonyBridgeBundle\Factory\CredentialStoreFactory;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;

class CredentialStoreFactoryTest extends TestCase
{
    use ProphecyTrait;

    public function test_returns_credential_store(): void
    {
        $credentialStore = $this->prophesize(CredentialStoreInterface::class);
        $credentialStore->getByEntityId(Argument::type('string'))
            ->willReturn([$this->prophesize(CredentialInterface::class)->reveal()]);

        $value = CredentialStoreFactory::build(
            $this->prophesize(EntityDescriptorStoreInterface::class)->reveal(),
            $this->prophesize(EntityDescriptorStoreInterface::class)->reveal(),
            'own-id',
            $credentialStore->reveal()
        );

        $this->assertInstanceOf(CredentialStoreInterface::class, $value);
    }
}
