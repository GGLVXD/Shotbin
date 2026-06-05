<?php
 
namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Basic production check
        URL::forceHttps($this->app->isProduction());
        // Or more specific environment control
        URL::forceHttps(
            $this->app->environment(['staging', 'production', 'demo'])
            && !$this->app->environment('testing')
        );
        // You might also want to combine it with other security headers
        if ($this->app->isProduction()) {
            $this->app['request']->server->set('HTTPS', true);
            
            // Add security headers
            $this->app['router']->middleware(function ($request, $next) {
                $response = $next($request);
                
                return $response->withHeaders([
                    'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',
                    'X-Frame-Options' => 'SAMEORIGIN',
                    'X-Content-Type-Options' => 'nosniff'
                ]);
            });
        }
    }
}