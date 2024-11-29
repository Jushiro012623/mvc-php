<?php

namespace Core;
use Core\Controller;
class Router
{
    protected $routes = [];
    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }
    public function resource($route, $controller,)
    {
        $this->get('/' . $route, $controller, 'index');
        $this->post('/' . $route, $controller, 'store');
        $this->get('/' . $route . '/create', $controller, 'create');
        $this->get('/' . $route . '/{id}', $controller, 'show');
        $this->post('/' . $route . '/{id}', $controller, 'update');
        $this->get('/' . $route . '/{id}/edit', $controller, 'edit');
        $this->post('/' . $route . '/{id}/delete', $controller, 'destroy');
    }
    public function get($route, $controller, $action = '__invoke')
    {
        $this->addRoute($route, $controller, $action, "GET");
    }
    public function post($route, $controller, $action = '__invoke')
    {
        $this->addRoute($route, $controller, $action, "POST");
    }
    public function put($route, $controller, $action = '__invoke')
    {
        $this->addRoute($route, $controller, $action, 'POST');
    }

    public function delete($route, $controller, $action = '__invoke')
    {
        $this->addRoute($route, $controller, $action, 'POST');
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
