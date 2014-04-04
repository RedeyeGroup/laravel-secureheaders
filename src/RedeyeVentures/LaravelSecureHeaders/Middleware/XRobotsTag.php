<?php namespace RedeyeVentures\LaravelSecureHeaders\Middleware;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class XRobotsTag extends BaseMiddleware {

    public function handle(SymfonyRequest $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        $response = $this->app->handle($request, $type, $catch);

        $xrtValue = \Config::get('secureheaders::settings.xRobotsTag.value');

        $response->headers->set('X-Robots-Tag', $xrtValue, false);
        return $response;
    }

}