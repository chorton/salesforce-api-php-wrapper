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
        $salesforceConfig = config('salesforce');

        $this->app->bind(SalesforceClient::class, function ($app) use($salesforceConfig) {

            $sfClient = SalesforceClient::create($salesforceConfig['api_base_url'], $salesforceConfig['client_id'], $salesforceConfig['client_secret'], $salesforceConfig['api_version']);

            $sfClient->login($salesforceConfig['username'], $salesforceConfig['password'].$salesforceConfig['token']);

            return $sfClient;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
