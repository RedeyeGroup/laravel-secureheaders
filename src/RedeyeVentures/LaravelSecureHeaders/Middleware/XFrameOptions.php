<?php namespace RedeyeVentures\LaravelSecureHeaders\Middleware;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class XFrameOptions extends BaseMiddleware {

    public function handle(SymfonyRequest $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        $response = $this->app->handle($request, $type, $catch);

        $xfoValue = \Config::get('secureheaders::settings.xFrameOptions.value');

        $response->headers->set('X-Frame-Options', $xfoValue, false);
        return $response;
    }

}