<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

class Controller
{
    /**
     * Container of slim application.
     *
     * @var \Interop\Container\ContainerInterface
     */
    protected $container;

    /**
     * Set container as implementation of ContainerInterface.
     *
     * @param \Interop\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * All property which is not in this will regard as member of container.
     *
     * @param string $property
     *
     * @return mixed property of container
     */
    public function __get($property)
    {
        return $this->container[$property];
    }
}
