<?php namespace RedeyeVentures\LaravelSecureHeaders\Middleware;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class XXssProtection extends BaseMiddleware {

    public function handle(SymfonyRequest $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        $response = $this->app->handle($request, $type, $catch);

        $xxpValue = \Config::get('secureheaders::settings.xXssProtection.value');
        if ($mode = \Config::get('secureheaders::settings.xXssProtection.mode'))
        {
            $xxpValue .= "; mode=$mode";
        }

        $response->headers->set('X-XSS-Protection', $xxpValue, false);
        return $response;
    }

}