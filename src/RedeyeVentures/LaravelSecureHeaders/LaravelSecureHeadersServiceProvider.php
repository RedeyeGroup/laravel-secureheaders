<?php namespace RedeyeVentures\LaravelSecureHeaders;

use Illuminate\Support\ServiceProvider;

class LaravelSecureHeadersServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('redeyeventures/laravel-secureheaders', 'secureheaders');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['config']->package('redeyeventures/laravel-secureheaders', __DIR__.'/../../config', 'secureheaders');

        if (\Config::get('secureheaders::settings.strictTransportSecurity.enabled'))
        {
            \App::middleware('RedeyeVentures\LaravelSecureHeaders\Middleware\StrictTransportSecurity');
        }

        if (\Config::get('secureheaders::settings.xContentTypeOptions.enabled'))
        {
            \App::middleware('RedeyeVentures\LaravelSecureHeaders\Middleware\XContentTypeOptions');
        }

        if (\Config::get('secureheaders::settings.xFrameOptions.enabled'))
        {
            # Replace Laravel Middleware with ours (this shouldn't be necessary in 4.2).
            \App::forgetMiddleware('Illuminate\Http\FrameGuard');

            \App::middleware('RedeyeVentures\LaravelSecureHeaders\Middleware\XFrameOptions');
        }

        if (\Config::get('secureheaders::settings.xXssProtection.enabled'))
        {
            \App::middleware('RedeyeVentures\LaravelSecureHeaders\Middleware\XXssProtection');
        }

        if (\Config::get('secureheaders::settings.xRobotsTag.enabled'))
        {
            \App::middleware('RedeyeVentures\LaravelSecureHeaders\Middleware\XRobotsTag');
        }

        if (\Config::get('secureheaders::settings.xDownloadOptions.enabled'))
        {
            \App::middleware('RedeyeVentures\LaravelSecureHeaders\Middleware\XDownloadOptions');
        }

    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
