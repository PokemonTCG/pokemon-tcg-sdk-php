<?php

namespace Pokemon\Models;

/**
 * Class Ability
 *
 * @package Pokemon\Models
 */
class Ability extends Model
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $type;

    /**
     * @return string
     */
    public function getName()
    {
        return (string)$this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return (string)$this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

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

}