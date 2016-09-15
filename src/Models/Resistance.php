<?php

namespace Pokemon\Models;

/**
 * Class Resistance
 *
 * @package Pokemon\Models
 */
class Resistance extends Model
{

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $value;

    /**
     * @return string
     */
    public function getType()
    {
        return (string)$this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return (string)$this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}