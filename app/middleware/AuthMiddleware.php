<?php

require_once '../app/core/Middleware.php';

class AuthMiddleware extends Middleware {
    public function handle($request, $next) {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        return $next($request);
    }
}
