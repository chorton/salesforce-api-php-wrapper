<?php

namespace Crunch\Salesforce;

use Illuminate\Support\Facades\Facade;

class SFClientFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SalesforceAPIClient';
    }
}
