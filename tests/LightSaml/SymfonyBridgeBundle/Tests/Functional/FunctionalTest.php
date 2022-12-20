<?php

namespace LightSaml\SymfonyBridgeBundle\Tests\Functional;

use LightSaml\Binding\BindingFactoryInterface;
use LightSaml\Build\Container\BuildContainerInterface;
use LightSaml\Build\Container\OwnContainerInterface;
use LightSaml\Build\Container\PartyContainerInterface;
use LightSaml\Build\Container\StoreContainerInterface;
use LightSaml\Build\Container\SystemContainerInterface;
use LightSaml\Credential\CredentialInterface;
use LightSaml\Provider\Attribute\AttributeValueProviderInterface;
use LightSaml\Provider\EntityDescriptor\EntityDescriptorProviderInterface;
use LightSaml\Provider\NameID\NameIdProviderInterface;
use LightSaml\Provider\Session\SessionInfoProviderInterface;
use LightSaml\Provider\TimeProvider\TimeProviderInterface;
use LightSaml\Resolver\Credential\CredentialResolverInterface;
use LightSaml\Resolver\Endpoint\EndpointResolverInterface;
use LightSaml\Resolver\Session\SessionProcessorInterface;
use LightSaml\Resolver\Signature\SignatureResolverInterface;
use LightSaml\Store\Credential\CredentialStoreInterface;
use LightSaml\Store\EntityDescriptor\EntityDescriptorStoreInterface;
use LightSaml\Store\Id\IdStoreInterface;
use LightSaml\Store\Request\RequestStateStoreInterface;
use LightSaml\Store\Sso\SsoStateStoreInterface;
use LightSaml\Store\TrustOptions\TrustOptionsStoreInterface;
use LightSaml\Validator\Model\Assertion\AssertionTimeValidatorInterface;
use LightSaml\Validator\Model\Assertion\AssertionValidatorInterface;
use LightSaml\Validator\Model\NameId\NameIdValidatorInterface;
use LightSaml\Validator\Model\Signature\SignatureValidatorInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Filesystem\Filesystem;

class FunctionalTest extends WebTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $_SERVER['KERNEL_CLASS'] = TestKernel::class;
        $_SERVER['KERNEL_DIR'] = __DIR__;
        $fs = new Filesystem();
        $fs->remove(__DIR__.'/cache');
    }

    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    public function test_build_container(): void
    {
        static::createClient();

        $buildContainer = static::getContainer()->get('lightsaml.container.build');
        $this->assertInstanceOf(BuildContainerInterface::class, $buildContainer);

        $ownContainer = $buildContainer->getOwnContainer();
        array_map(function ($credential) {
            $this->assertInstanceOf(CredentialInterface::class, $credential);
        }, $ownContainer->getOwnCredentials());
    }
}
