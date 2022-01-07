<?php


namespace Core;


use Core\Exceptions\Middleware\MiddlewareException;
use Core\Interfaces\MiddlewareInterface;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;

class Middleware
{

    private static ?Middleware $_instance = null;
    public int $index = 0;
    /**
     * @var string[]
     */
    private array $middlewares;

    /**
     * Middleware constructor.
     * @param string[] $middlewares
     */
    public function __construct(array $middlewares = [])
    {
        $this->middlewares = $middlewares;
    }

    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * Lance le process de middleware en static
     *
     * @param string[]|string $middlewares
     * @return bool
     * @throws MiddlewareException
     */
    public static function run($middlewares)
    {
        if(empty($middlewares)){
            throw new MiddlewareException("Il n'y a aucun middleware");
        }
        if(!is_array($middlewares)){
            $middlewares = [$middlewares];
        }
        self::$_instance = new static($middlewares);
        return self::$_instance->process(ServerRequest::fromGlobals());
    }

    public function process(ServerRequestInterface $request)
    {
        if($this->index < count($this->middlewares)){
            $index = $this->index;
            $this->index++;
            if(!empty($this->middlewares[$index]) && new $this->middlewares[$index]() instanceof MiddlewareInterface){
                return call_user_func([new $this->middlewares[$index](), 'process'], [$this, 'process'], $request);
            }
        }
        return true;
    }

    /**
     * @param mixed|null $key
     * @return string[]|null
     */
    public function getMiddlewares($key = null)
    {
        if($key){
            return $this->middlewares[$key] ?? null;
        }
        return $this->middlewares;
    }
}