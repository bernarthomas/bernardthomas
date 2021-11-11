<?php
namespace App\Routing;

use RuntimeException;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class AccueilLoader extends Loader
{
    private $isLoaded = false;

    public function load($resource, $type = null)
    {
        if (true === $this->isLoaded) {
            throw new RuntimeException('Do not add the "extra" loader twice');
        }
        $routes = new RouteCollection();
        // prepare a new route
        $path = '/{parametre}';
        $defaults = [
            '_controller' => 'App\Controller\AccueilController::billets',
        ];
        $requirements = [
        ];
        $route = new Route($path, $defaults, $requirements);
        // add the new route to the route collection
        $routeName = 'billet';
        $routes->add($routeName, $route);
        $this->isLoaded = true;

        return $routes;
    }

    /**
     * @param mixed $resource
     * @param null $type
     *
     * @return bool
     */
    public function supports($resource, $type = null)
    {
        return 'billet' === $type;
    }
}
