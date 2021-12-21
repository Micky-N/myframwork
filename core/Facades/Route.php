<?php

namespace Core\Facades;

use Core\Route as CoreRoute;


/**
 * @method static \Core\Router get(string $path, $action)
 * @method static \Core\Router post(string $path, $action)
 * @method static bool namespaceRoute(string $route = '')
 * @method static array routesByName()
 * @method static void crud(string $namespace, $controller, array $only = [])
 * @method static string routeNeedParams(string $path)
 * @method static string generateUrlByName(string $routeName, array $params = [])
 * @method static bool|string currentRoute(string $route = '')
 * @method static void run(\Psr\Http\Message\ServerRequestInterface $request)
 * @method static \Core\Route redirectName(string $name)
 * @method static \Core\Route redirect(string $url)
 * @method static \Core\Route withError(array $errors)
 * @method static \Core\Route withSuccess(array $success)
 * @method static \Core\Route with(array $messages)
 * @method static \Core\Route back()
 * @method static array toArray()
 *
 * @see \Core\Route
 */
class Route{

    /**
     * @var CoreRoute|null
     */
    public static ?CoreRoute $route;

    /**
     * @param $method
     * @param $arguments
     * @return void
     */
    public static function __callStatic($method, $arguments)
    {
        if(empty(self::$route)){
            self::$route = new CoreRoute();
        }
        return call_user_func_array([self::$route, $method], $arguments);
    }
}