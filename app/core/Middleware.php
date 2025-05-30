<?php

abstract class Middleware {
    /**
     * Handle the request and pass control to the next middleware or controller.
     *
     * @param array $request The current request data.
     * @param callable $next The next middleware or controller.
     * @return mixed
     */
    abstract public function handle($request, $next);
}
