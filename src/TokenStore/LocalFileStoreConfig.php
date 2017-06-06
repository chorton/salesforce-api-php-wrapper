<?php
namespace Crunch\Salesforce\TokenStore;

class LocalFileStoreConfig implements LocalFileConfigInterface {

    protected $localFilePath;

    public function __constructor($path=null)
    {
        $this->setFilePath($path);
    }

    /**
     * The path where the file will be stored, no trailing slash, must be writable
     *
     * @return string
     */
    public function getFilePath()
    {
    	if(!is_null($this->localFilePath)) {
    		return $this->localFilePath;
    	}
        return __DIR__;
    }

    public function setFilePath($path=null)
    {
        $this->localFilePath = $path;
    }
}
