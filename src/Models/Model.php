<?php

namespace Pokemon\Models;

use stdClass;

abstract class Model
{
    /**
     * Model constructor.
     *
     * @param mixed $data
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->populate($data);
        }
    }

    /**
     * @param mixed $data
     *
     * @return Model
     */
    abstract public function populate($data);

    /**
     * @param string     $attribute
     * @param mixed      $data
     * @param mixed|null $default
     *
     * @return mixed|null
     */
    protected function process($attribute, $data, $default = null)
    {
        $result = $default;

        if (is_object($data) && isset($data->{$attribute})) {
            $result = $data->{$attribute};
        }

        if (is_array($data) && array_key_exists($attribute, $data)) {
            $result = $data[$attribute];
        }

        return $result;
    }

    /**
     * @return array
     */
    abstract public function toArray();

}