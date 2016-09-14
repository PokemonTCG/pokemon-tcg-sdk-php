<?php

namespace Pokemon\Resources;

use Pokemon\Resources\Interfaces\ResourceInterface;
use stdClass;

class ArrayDataResource extends Resource implements ResourceInterface
{
    /**
     * @param stdClass $data
     *
     * @return mixed
     */
    protected function format(stdClass $data)
    {
        $attributes = get_object_vars($data);
        if (count($attributes) === 1) {
            return $data->{array_keys($attributes)[0]};
        }

        return $data;
    }
}