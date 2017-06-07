<?php
namespace Crunch\Salesforce\TokenStore;

class LocalFileStoreConfig implements LocalFileConfigInterface {

    /**
     * The path where the file will be stored, no trailing slash, must be writable
     *
     * @return string
     */
    public function getFilePath()
    {
        return storage_path('app/salesforce');
    }
}
