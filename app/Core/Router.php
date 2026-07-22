<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    /**
     * Daftar route.
     */
    private array $routes = [];

    /**
     * Prefix route group.
     */
    private string $prefix = '';

    /**
     * Middleware bawaan dari group.
     */
    private array $groupMiddleware = [];

    /**
     * Daftarkan route GET.
     */
    public function get(
        string $uri,
        callable $callback,
        array $middleware = []
    ): void {
        $this->addRoute('GET', $uri, $callback, $middleware);
    }

    /**
     * Daftarkan route POST.
     */
    public function post(
        string $uri,
        callable $callback,
        array $middleware = []
    ): void {
        $this->addRoute('POST', $uri, $callback, $middleware);
    }

    /**
     * Tambahkan route.
     */
    private function addRoute(
        string $method,
        string $uri,
        callable $callback,
        array $middleware
    ): void {

        $uri = '/' . ltrim($uri, '/');

        $path = rtrim($this->prefix, '/') . $uri;

        if ($path === '') {
            $path = '/';
        }

        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        $this->routes[strtoupper($method)][$path] = [
            'callback' => $callback,
            'middleware' => array_merge(
                $this->groupMiddleware,
                $middleware
            ),
        ];
    }

    /**
     * Route Group.
     */
    public function group(
        string $prefix,
        callable $callback,
        array $middleware = []
    ): void {

        $oldPrefix = $this->prefix;
        $oldMiddleware = $this->groupMiddleware;

        $prefix = '/' . trim($prefix, '/');

        if ($prefix === '/') {
            $prefix = '';
        }

        $this->prefix = rtrim($oldPrefix, '/') . $prefix;

        $this->groupMiddleware = array_merge(
            $oldMiddleware,
            $middleware
        );

        $callback($this);

        $this->prefix = $oldPrefix;
        $this->groupMiddleware = $oldMiddleware;
    }

    /**
     * Jalankan route.
     */
    public function dispatch(
        string $method,
        string $uri
    ): void {

        $method = strtoupper($method);

        $uri = parse_url($uri, PHP_URL_PATH) ?: '/';

        if ($uri !== '/') {
            $uri = rtrim($uri, '/');
        }

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "<h1>404 Not Found</h1>";
            echo "<p>Halaman tidak ditemukan.</p>";
            return;
        }

        $route = $this->routes[$method][$uri];

        foreach ($route['middleware'] as $middleware) {
            if (method_exists($middleware, 'handle')) {
                $middleware->handle();
            }
        }

        call_user_func($route['callback']);
    }
}
