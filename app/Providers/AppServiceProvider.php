<?php

namespace App\Providers;

use App\Commands\Navigate;
use App\Service\ClientRequestInterface;
use App\Service\LiveClientRequest;
use App\Service\TestClientRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Input\ArgvInput;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot():void
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register():void
    {
        //returning a concrete Client request interface depending on the config. Mainly for testing
        $this->app->singleton(ClientRequestInterface::class, function($app){
            if(\config('app')['env'] === 'live') {
                return new LiveClientRequest();
            }
            return new TestClientRequest();
        });
    }
}
