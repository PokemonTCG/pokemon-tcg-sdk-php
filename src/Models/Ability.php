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
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param mixed $data
     *
     * @return Ability
     */
    public function populate($data)
    {
        $this->setName($this->process('name', $data, ''));
        $this->setText($this->process('text', $data, ''));
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'text' => $this->getText(),
        ];
    }
}