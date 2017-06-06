<?php namespace Crunch\Salesforce\TokenStore;

interface LocalFileConfigInterface {

    public function __constructor($path=null);

    /**
     * The path where the file will be stored, no trailing slash, must be writable
     *
     * @return string
     */
    public function getFilePath();

    /**
     * Set the file storage path.  Must be writable
     * @param string $path
     */
    public function setFilePath($path=null);
}