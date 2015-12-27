<?php
namespace App\Controllers;

use InvalidArgumentException;
use \Interop\Container\ContainerInterface;

class Controller
{
    /**
     * The instance of \Slim\App class.
     * @var \Slim\App
     */
    protected $app;

    /**
     * Container of slim application.
     * @var Interop\Container\ContainerInterface
     */
    protected $container;

    /**
     * Set application as instance of \Slim\App.
     * @param \Slim\app $app
     */
    public function setApplication(\Slim\App $app)
    {
        $this->app = $app;
    }

    /**
     * Set container as implementation of ContainerInterface.
     * @param Interop\Container\ContainerInterface $container
     */
    public function setContainer($container)
    {
        if (!$container instanceof ContainerInterface) {
            throw new InvalidArgumentException('Expected a ContainerInterface');
        }
        $this->container = $container;
    }

    /**
     * All property which is not in this will regard as member of container.
     *
     * @param  string $property
     * @return mixed  property of container
     */
    public function __get($property)
    {
        return $this->container[$property];
    }

    /**
     * Entry of all controllers and actions;
     * However you can also override it if you want.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $res  PSR7 response
     * @param  array                                    $args Route parameters
     */
    public function __invoke($request, $response, $args)
    {
        // At frist we should get the action from router.
        $action = strtolower($request->getMethod()) . ucfirst($request->getAttribute('action'));
         // Then if the method is existed, we can call it;
         // Or we should throw \Slim\Exception\NotFoundException.
        if (method_exists($instance = new static, $action)) {
            // Set application and container from global variables.
            $instance->setApplication($GLOBALS['app']);
            $instance->setContainer($GLOBALS['container']);
            // Remove {action} from args.
            array_shift($args);
            // Get response body and write it to response.
            $content = call_user_func_array([$instance, $action], $args);
            $response->getBody()->write($content);
        } else {
            throw new \Slim\Exception\NotFoundException($request, $response);
        }
    }
}
