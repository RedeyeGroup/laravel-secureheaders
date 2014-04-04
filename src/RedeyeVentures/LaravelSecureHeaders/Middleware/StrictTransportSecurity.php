<?php namespace RedeyeVentures\LaravelSecureHeaders\Middleware;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class StrictTransportSecurity extends BaseMiddleware {

    public function handle(SymfonyRequest $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        $response = $this->app->handle($request, $type, $catch);

        $stsValue = 'max-age='.\Config::get('secureheaders::settings.strictTransportSecurity.maxAge');
        if (\Config::get('secureheaders::settings.strictTransportSecurity.includeSubdomains'))
        {
            $stsValue .= "; includeSubdomains";
        }

        $response->headers->set('Strict-Transport-Security', $stsValue, false);
        return $response;
    }

}