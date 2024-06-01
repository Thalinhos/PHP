<?php

function route($uri, $callback) {
    static $routes = [];

    if ($callback) {
        $routes[$uri] = $callback;
    } else {
        foreach ($routes as $route => $handler) {
            $pattern = preg_replace('/{[^\/]+}/', '([^\/]+)', $route);
            if (preg_match("#^{$pattern}$#", $uri, $matches)) {
                array_shift($matches);
                return call_user_func_array($handler, $matches);
            }
        }
        http_response_code(404);
        echo "Page not found";
    }
}

route('/', function() {
    require __DIR__ . '/../views/home.php';
});

route('/users', function() {
    require __DIR__ . '/../views/users.php';
});

route('/user/{id}', function($id) {
    require __DIR__ . '/../views/user.php';
});

