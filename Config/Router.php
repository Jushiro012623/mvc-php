<?php
namespace Config;
class Router
{ 
    protected $routes = [];
    
    /** 
     *  @param {string} $route
     * @param array $controller
     **/
    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }
    public function get($route, $controller, $action = '__invoke')
    {
        $this->addRoute($route, $controller, $action, "GET");
    }
    public function post($route, $controller, $action = '__invoke')
    {
        $this->addRoute($route, $controller, $action, "POST");
    }
    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method =  $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes[$method] as $route => $handler) {
            $pattern = preg_replace('/{(\w+)}/', '(?P<$1>\w+)', $route);
            $pattern = "#^" . $pattern . "$#"; 
            if (preg_match($pattern, $uri, $matches)) {
                $controller = $handler['controller'];
                $action = $handler['action'];
                $controller = new $controller();
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                call_user_func_array([$controller, $action], $params);
                return;
            }
        }
        return (new Controller())->abort(404);
    }
}