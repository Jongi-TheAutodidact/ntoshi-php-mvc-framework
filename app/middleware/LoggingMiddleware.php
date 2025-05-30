<?php

require_once '../app/core/Middleware.php';

class LoggingMiddleware extends Middleware {
    public function handle($request, $next) {
        error_log("Accessed URL: " . $request['url']);
        return $next($request);
    }
}
