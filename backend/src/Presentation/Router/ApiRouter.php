<?php
declare(strict_types=1);

namespace Presentation\Router;

use Presentation\Http\JsonResponse;

final class ApiRouter
{
    private static array $routes = [];

    public static function post(string $uri, callable $controller): void
    {
        self::$routes['POST'][$uri] = $controller;
    }

    public static function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? '';
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '';

        if (!isset(self::$routes[$method][$uri])) {
            (new JsonResponse(['error' => 'Not Found'], 404))->send();
            return;
        }

        $response = call_user_func(self::$routes[$method][$uri]);

        if ($response instanceof JsonResponse) {
            $response->send();
            return;
        }

        // fallback de segurança
        (new JsonResponse(['error' => 'Invalid response'], 500))->send();
    }
}
