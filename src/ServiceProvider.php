<?php

namespace Crunch\Salesforce;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Response;

use Crunch\Salesforce\Client as SalesforceClient;

use Exception;

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

        $sfClient = SalesforceClient::create($salesforceConfig['api_base_url'], $salesforceConfig['client_id'], $salesforceConfig['client_secret'], $salesforceConfig['api_version']);

        $tokenStore = new \Crunch\Salesforce\TokenStore\LocalFile(new \Crunch\Salesforce\AccessTokenGenerator, new \Crunch\Salesforce\TokenStore\LocalFileStoreConfig());

        try {
            $accessToken = $tokenStore->fetchAccessToken();
            if ($accessToken->needsRefresh()) {
                $accessToken = $sfClient->login($salesforceConfig['username'], $salesforceConfig['password'].$salesforceConfig['token'], $salesforceConfig['token_expiry_hours']);
                $tokenStore->saveAccessToken($accessToken);
            }
        } catch(Exception $e) {
            $accessToken = $sfClient->login($salesforceConfig['username'], $salesforceConfig['password'].$salesforceConfig['token'], $salesforceConfig['token_expiry_hours']);

            $tokenStore->saveAccessToken($accessToken);
        }

        $this->app->singleton('SalesforceAPIClient', function ($app) use ($sfClient) {
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
