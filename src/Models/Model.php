<?php

namespace Pokemon\Models;

use Doctrine\Inflector\InflectorFactory;
use ReflectionClass;
use ReflectionException;
use ReflectionProperty;
use stdClass;

/**
 * Class Model
 *
 * @package Pokemon\Models
 */
class Model
{

    /**
     * @var array
     */
    protected $methods;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->methods = array_flip(get_class_methods(get_class($this)));

        return $this;
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function getAttributes()
    {
        $reflect = new ReflectionClass($this);
        $properties = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);

        return array_map(function (ReflectionProperty $property) {
            return $property->getName();
        }, $properties);
    }

    /**
     * @param stdClass $data
     */
    public function fill(stdClass $data)
    {
        foreach ($data as $attribute => $value) {

            if (is_array($value)) {
                foreach ($value as $key => $val) {
                    $value[$key] = $this->parse($attribute, $val);
                }
            } else {
                $value = $this->parse($attribute, $value);
            }

            switch ($attribute) {
                case '1stEditionNormal':
                    $method = 'setFirstEditionNormal';
                    break;

                default:
                    $method = 'set' . ucfirst($attribute);
            }

            if (isset($this->methods[$method])) {
                $this->{$method}($value);
            }
        }
    }

    /**
     * @param string $attribute
     * @param mixed $value
     *
     * @return mixed|Model
     */
    protected function parse($attribute, $value)
    {
        $inflector = InflectorFactory::create()->build();

        if (is_object($value)) {
            switch ($attribute) {
                case 'images':
                    $class = get_class($this) . 'Images';
                    break;

                case 'legalities':
                    $class = '\\Pokemon\\Models\\Legalities';
                    break;

                case 'prices':
                    $class = '\\Pokemon\\Models\\Prices';
                    break;

                case 'tcgplayer':
                    $class = '\\Pokemon\\Models\\TCGPlayer';
                    break;

                case 'cardmarket':
                    $class = '\\Pokemon\\Models\\CardMarket';
                    break;

                default:
                    $class = '\\Pokemon\\Models\\' . ucfirst($inflector->singularize($attribute));
            }

            if (class_exists($class)) {
                /** @var Model $model */
                $model = new $class;
                $model->fill($value);
                $value = $model;
            }
        }

        return $value;
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function toArray()
    {
        $array = [];
        $attributes = $this->getAttributes();
        if (!empty($attributes)) {
            foreach ($attributes as $attribute) {
                $method = 'get' . ucfirst($attribute);
                if (isset($this->methods[$method])) {
                    $value = $this->{$method}();
                    if (is_array($value)) {
                        foreach ($value as $key => $val) {
                            $value[$key] = $this->valueToArray($val);
                        }
                    } else {
                        $value = $this->valueToArray($value);
                    }
                    $array[$attribute] = $value;
                }
            }
        }

        return $array;
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     * @throws ReflectionException
     */
    protected function valueToArray($value)
    {
        if ($value instanceof Model) {
            $value = $value->toArray();
        }

        return $value;
    }

    /**
     * @return string
     * @throws ReflectionException
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

}
