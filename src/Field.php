<?php
/**
 * Created by PhpStorm.
 * User: aaflalo
 * Date: 10/08/16
 * Time: 11:26 AM
 */

namespace Crunch\Salesforce;


/**
 * Class Field
 *
 * A basic saleforce field
 *
 * @package Crunch\Salesforce
 */
class Field
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $label;
    /**
     * @var int
     */
    private $length;
    /**
     * @var string
     */
    private $type;


    /**
     * Field constructor.
     *
     * @param string $name
     * @param string $label
     * @param int    $length
     * @param string $type
     */
    public function __construct($name, $label, $length, $type)
    {
        $this->name   = $name;
        $this->label  = $label;
        $this->length = $length;
        $this->type   = $type;
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
     * Getter for label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Getter for length
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Getter for type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

}