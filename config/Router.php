<?php
namespace config;

use App\Controllers\ErrorController;

class Router
{
    private array $routes = [];

    public function getURI()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**  Permet d'ajouter une route dans le tableau $routes.
     * @param string 
     * @param string 
     * @param string 
     */
    public function addRoute(string $pattern, string $controllerName, string $method)
    {
        $this->routes[$pattern] = [
            'controller' => $controllerName,
            'method' => $method,
 
        ];
    }

    public function handleRequest()
    {
        $uri = $this->getURI();
        $routeFound = false;

        foreach ($this->routes as $pattern => $routeInfo)
        {
            if($uri === $pattern){

                $routeFound = true;

                $controllerClass = $routeInfo['controller'];
                $method = $routeInfo['method'];
                
                $controllerClass = "App\\Controllers\\" . $controllerClass;

                $controller = new $controllerClass();

                $controller->$method();

                break;

            }
        }
        if(!$routeFound){
            echo ErrorController::notFound();
        }
    }

}