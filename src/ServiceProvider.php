<?php

namespace Crunch\Salesforce;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Response;

use Crunch\Salesforce\Client as SalesforceClient;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $salesforceConfig = config('salesforce');

        $sfClient = SalesforceClient::create($salesforceConfig['api_base_url'], $salesforceConfig['client_id'], $salesforceConfig['client_secret'], $salesforceConfig['api_version']);
        $sfClient->login($salesforceConfig['username'], $salesforceConfig['password'].$salesforceConfig['token']);

        $this->app->singleton(SalesforceClient::class, function ($app) use ($sfClient) {
            return $sfClient;
        });

    }
}
