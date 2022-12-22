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

use LightSaml\Build\Container\SystemContainerInterface;
use LightSaml\Provider\TimeProvider\TimeProviderInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SystemContainer implements SystemContainerInterface
{
    private RequestStack $requestStack;

    private TimeProviderInterface $timeProvider;

    private EventDispatcherInterface $eventDispatcher;

    private LoggerInterface $logger;

    public function __construct(
        RequestStack $requestStack,
        TimeProviderInterface $timeProvider,
        EventDispatcherInterface $eventDispatcher,
        LoggerInterface $logger
    ) {
        $this->requestStack = $requestStack;
        $this->timeProvider = $timeProvider;
        $this->eventDispatcher = $eventDispatcher;
        $this->logger = $logger;
    }

    public function getRequest(): Request
    {
        return $this->requestStack->getCurrentRequest();
    }

    public function getSession(): SessionInterface
    {
        return $this->requestStack->getSession();
    }

    public function getTimeProvider(): TimeProviderInterface
    {
        return $this->timeProvider;
    }

    public function getEventDispatcher(): EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}
