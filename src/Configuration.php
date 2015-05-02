<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter;

use Http\Adapter\Message\MessageFactory;
use Http\Adapter\Message\MessageFactoryInterface;
use Http\Adapter\Message\MessageInterface;

/**
 * {@inheritdoc}
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @var MessageFactoryInterface
     */
    private $messageFactory;

    /**
     * @var string
     */
    private $protocolVersion = MessageInterface::PROTOCOL_VERSION_1_1;

    /**
     * @var boolean
     */
    private $keepAlive = false;

    /**
     * @var string|null
     */
    private $encodingType;

    /**
     * @var string
     */
    private $boundary;

    /**
     * @var float
     */
    private $timeout = 10;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * @param MessageFactoryInterface|null $messageFactory
     */
    public function __construct(MessageFactoryInterface $messageFactory = null)
    {
        $this->setMessageFactory($messageFactory ?: new MessageFactory());
        $this->setBoundary(sha1(microtime()));
        $this->setUserAgent('PHP Http Adapter');
    }

    /**
     * {@inheritdoc}
     */
    public function getMessageFactory()
    {
        return $this->messageFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessageFactory(MessageFactoryInterface $factory)
    {
        $this->messageFactory = $factory;
    }

    /**
     * {@inheritdoc}
     */
    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }

    /**
     * {@inheritdoc}
     */
    public function setProtocolVersion($protocolVersion)
    {
        $this->protocolVersion = $protocolVersion;
    }

    /**
     * {@inheritdoc}
     */
    public function isKeptAlive()
    {
        return $this->keepAlive;
    }

    /**
     * {@inheritdoc}
     */
    public function setKeepAlive($keepAlive)
    {
        $this->keepAlive = $keepAlive;
    }

    /**
     * {@inheritdoc}
     */
    public function getEncodingType()
    {
        return $this->encodingType;
    }

    /**
     * {@inheritdoc}
     */
    public function hasEncodingType()
    {
        return isset($this->encodingType);
    }

    /**
     * {@inheritdoc}
     */
    public function setEncodingType($encodingType)
    {
        $this->encodingType = $encodingType;
    }

    /**
     * {@inheritdoc}
     */
    public function getBoundary()
    {
        return $this->boundary;
    }

    /**
     * {@inheritdoc}
     */
    public function setBoundary($boundary)
    {
        $this->boundary = $boundary;
    }

    /**
     * {@inheritdoc}
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * {@inheritdoc}
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * {@inheritdoc}
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseUri()
    {
        return $this->messageFactory->getBaseUri();
    }

    /**
     * {@inheritdoc}
     */
    public function hasBaseUri()
    {
        return $this->messageFactory->hasBaseUri();
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseUri($baseUri)
    {
        $this->messageFactory->setBaseUri($baseUri);
    }
}
