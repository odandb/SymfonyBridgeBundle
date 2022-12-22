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

use LightSaml\Binding\BindingFactoryInterface;
use LightSaml\Build\Container\ServiceContainerInterface;
use LightSaml\Resolver\Credential\CredentialResolverInterface;
use LightSaml\Resolver\Endpoint\EndpointResolverInterface;
use LightSaml\Resolver\Session\SessionProcessorInterface;
use LightSaml\Resolver\Signature\SignatureResolverInterface;
use LightSaml\Validator\Model\Assertion\AssertionTimeValidatorInterface;
use LightSaml\Validator\Model\Assertion\AssertionValidatorInterface;
use LightSaml\Validator\Model\NameId\NameIdValidatorInterface;
use LightSaml\Validator\Model\Signature\SignatureValidatorInterface;

class ServiceContainer implements ServiceContainerInterface
{
    private AssertionValidatorInterface $assertionValidator;

    private AssertionTimeValidatorInterface $assertionTimeValidator;

    private SignatureResolverInterface $signatureResolver;

    private EndpointResolverInterface $endpointResolver;

    private NameIdValidatorInterface $nameIdValidator;

    private BindingFactoryInterface $bindingFactory;

    private SignatureValidatorInterface $signatureValidator;

    private CredentialResolverInterface $credentialResolver;

    private SessionProcessorInterface $sessionProcessor;

    public function __construct(
        AssertionValidatorInterface $assertionValidator,
        AssertionTimeValidatorInterface $assertionTimeValidator,
        SignatureResolverInterface $signatureResolver,
        EndpointResolverInterface $endpointResolver,
        NameIdValidatorInterface $nameIdValidator,
        BindingFactoryInterface $bindingFactory,
        SignatureValidatorInterface $signatureValidator,
        CredentialResolverInterface $credentialResolver,
        SessionProcessorInterface $sessionProcessor
    ) {
        $this->assertionValidator = $assertionValidator;
        $this->assertionTimeValidator = $assertionTimeValidator;
        $this->signatureResolver = $signatureResolver;
        $this->endpointResolver = $endpointResolver;
        $this->nameIdValidator = $nameIdValidator;
        $this->bindingFactory = $bindingFactory;
        $this->signatureValidator = $signatureValidator;
        $this->credentialResolver = $credentialResolver;
        $this->sessionProcessor = $sessionProcessor;
    }

    public function getAssertionValidator(): AssertionValidatorInterface
    {
        return $this->assertionValidator;
    }

    public function getAssertionTimeValidator(): AssertionTimeValidatorInterface
    {
        return $this->assertionTimeValidator;
    }

    public function getSignatureResolver(): SignatureResolverInterface
    {
        return $this->signatureResolver;
    }

    public function getEndpointResolver(): EndpointResolverInterface
    {
        return $this->endpointResolver;
    }

    public function getNameIdValidator(): NameIdValidatorInterface
    {
        return $this->nameIdValidator;
    }

    public function getBindingFactory(): BindingFactoryInterface
    {
        return $this->bindingFactory;
    }

    public function getSignatureValidator(): SignatureValidatorInterface
    {
        return $this->signatureValidator;
    }

    public function getCredentialResolver(): CredentialResolverInterface
    {
        return $this->credentialResolver;
    }

    public function getLogoutSessionResolver()
    {
        throw new \LogicException('Not implemented');
    }

    public function getSessionProcessor(): SessionProcessorInterface
    {
        return $this->sessionProcessor;
    }
}
