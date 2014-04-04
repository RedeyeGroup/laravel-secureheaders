<?php namespace RedeyeVentures\LaravelSecureHeaders\Middleware;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class XDownloadOptions extends BaseMiddleware {

    public function handle(SymfonyRequest $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        $response = $this->app->handle($request, $type, $catch);

        // noopen is the only valid option, so hardcoding this should be fine.
        $response->headers->set('X-Download-Options', 'noopen', false);
        return $response;
    }

}