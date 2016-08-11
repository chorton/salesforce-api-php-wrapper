<?php
/**
 * Created by PhpStorm.
 * User: aaflalo
 * Date: 11/08/16
 * Time: 9:12 AM
 */

namespace Crunch\Salesforce\Object;


class SObject
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var bool
     */
    private $isCustom;
    /**
     * @var string
     */
    private $label;


    /**
     * SObject constructor.
     *
     * @param $name
     * @param $isCustom
     * @param $label
     */
    public function __construct($name, $isCustom, $label)
    {
        $this->name     = $name;
        $this->isCustom = $isCustom;
        $this->label    = $label;
    }

    /**
     * Getter for name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Getter for isCustom
     *
     * @return boolean
     */
    public function isIsCustom()
    {
        return $this->isCustom;
    }

    /**
     * Getter for label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }


}