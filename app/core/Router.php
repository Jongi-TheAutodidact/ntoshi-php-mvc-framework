<?php

class Router {
    private $routes;

    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function dispatch($url) {
        foreach ($this->routes as $route => $handler) {
            // Convert the route to a regex to match parameters
            $routeRegex = preg_replace('/{([^}]+)}/', '([^/]+)', $route);
            $routeRegex = '#^' . $routeRegex . '$#';

            if (preg_match($routeRegex, $url, $matches)) {
                // Extract parameters
                array_shift($matches); // Remove the full match
                [$controller, $method] = $handler;

                // Check for middleware
                $middleware = $handler['middleware'] ?? [];

                // Process middleware
                $middlewareStack = $this->loadMiddleware($middleware);

                $next = function () use ($controller, $method, $matches) {
                    $controllerFile = "../app/controllers/{$controller}.php";
                    if (!file_exists($controllerFile)) {
                        require '../app/views/404.ntoshi.php';
                        return;
                    }

                    require_once $controllerFile;
                    $controllerInstance = new $controller();

                    if (method_exists($controllerInstance, $method)) {
                        call_user_func_array([$controllerInstance, $method], $matches);
                    } else {
                        require '../app/views/404.ntoshi.php';
                    }
                };

                // Execute middleware stack
                $this->executeMiddleware($middlewareStack, ['url' => $url], $next);
                return;
            }
        }

        // Default 404 handler
        require '../app/views/404.ntoshi.php';
    }

    private function loadMiddleware(array $middleware): array {
        $middlewareStack = [];
        foreach ($middleware as $mw) {
            $middlewareFile = "../app/middleware/{$mw}.php";
            if (file_exists($middlewareFile)) {
                require_once $middlewareFile;
                if (class_exists($mw)) {
                    $middlewareStack[] = new $mw();
                }
            }
        }
        return $middlewareStack;
    }

    private function executeMiddleware(array $middlewareStack, $request, $next) {
        $pipeline = array_reduce(array_reverse($middlewareStack), function ($nextLayer, $middleware) {
            return function ($request) use ($nextLayer, $middleware) {
                return $middleware->handle($request, $nextLayer);
            };
        }, $next);

        $pipeline($request);
    }
}
