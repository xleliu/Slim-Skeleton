<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Slim\Exception\NotFoundException;

class Controller
{
    /**
     * Container of slim application.
     *
     * @var Interop\Container\ContainerInterface
     */
    protected $container;

    /**
     * Set container as implementation of ContainerInterface.
     *
     * @param Interop\Container\ContainerInterface $container
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

    /**
     * Entry of all controllers and actions;
     * However you can also override it if you want.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
     * @param \Psr\Http\Message\ResponseInterface      $res  PSR7 response
     * @param array                                    $args Route parameters
     */
    public function __invoke($request, $response, $args)
    {
        // We would get first argument as action, if it does not existed, set it as index
        // else we should get the action from router and remove it from arguments.
        $action = count($args) < 1 ? 'Index' : ucfirst(array_shift($args));
        $action = strtolower($request->getMethod()) . $action;
        // Then if the method is existed, we can call it;
        // Or we should throw \Slim\Exception\NotFoundException.
        $instance = new static($this->container);
        if (method_exists($instance, $action)) {
            // Get response body and write it to response.
            $content = call_user_func_array([$instance, $action], $args);

            return $response->withJson($content);
        } else {
            throw new NotFoundException($request, $response);
        }
    }
}
