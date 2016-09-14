<?php

namespace Pokemon\Resources;

use Pokemon\Models\Card;
use Pokemon\Resources\Interfaces\QueriableResourceInterface;
use stdClass;

class CardResource extends QueriableResource implements QueriableResourceInterface
{
    
    /**
     * @param stdClass $data
     *
     * @return mixed
     */
    protected function format(stdClass $data)
    {
        if (isset($data->card)) {
            return new Card($data->card);
        }

        $results = [];
        if (isset($data->cards)) {
            foreach ($data->cards as $card) {
                $results[] = new Card($card);
            }
        }

        return $results;
    }

}