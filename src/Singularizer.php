<?php
declare(strict_types=1);

namespace Pokemon;

use Doctrine\Common\Inflector\Inflector;
use Doctrine\Inflector\InflectorFactory;

class Singularizer
{
    public static function singularize(string $word): string
    {
        if (\class_exists(Inflector::class)) {
            return Inflector::singularize($word);
        }

        if (\class_exists(InflectorFactory::class)) {
            static $inflector;

            if ($inflector === null) {
                $inflector = InflectorFactory::create()->build();
            }

            return $inflector->singularize($word);
        }

        return $word;
    }
}
