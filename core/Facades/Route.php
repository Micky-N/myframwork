<?php

namespace Core\Facades;

use Core\Module;
use Core\Router as CoreRouter;


/**
 * @method static \Core\Route get(string $path, $action)
 * @method static \Core\Route post(string $path, $action)
 * @method static bool namespaceRoute(string $route = '')
 * @method static array routesByName()
 * @method static void parseRoutes(array $routesYaml, Module $module = null, bool $isAdminRoute = false)
 * @method static \Core\Route[] getRoutes()
 * @method static void crud(string $namespace, string $controller, array $only = [], string $moduleName = null, bool $isAdminRoute = false)
 * @method static string routeNeedParams(string $path)
 * @method static string generateUrlByName(string $routeName, array $params = [])
 * @method static bool|string currentRoute(string $route = '', bool $path = false)
 * @method static void run(\Psr\Http\Message\ServerRequestInterface $request)
 * @method static \Core\Router redirectName(string $name)
 * @method static \Core\Router redirect(string $url)
 * @method static \Core\Router withError(array $errors)
 * @method static \Core\Router withSuccess(array $success)
 * @method static \Core\Router with(array $messages)
 * @method static \Core\Router back()
 * @method static array toArray()
 *
 * @see \Core\Router
 */
class Route{

    /**
     * @var CoreRouter|null
     */
    public static ?CoreRouter $router;

    /**
     * @param $method
     * @param $arguments
     * @return void
     */
    public static function __callStatic($method, $arguments)
    {
        if(empty(self::$router)){
            self::$router = new CoreRouter();
        }
        return call_user_func_array([self::$router, $method], $arguments);
    }
}