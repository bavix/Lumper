<?php

namespace Bavix\Lumper;

class Lumper
{

    /**
     * @var []
     */
    protected $instances = [];

    /**
     * @param callable $callback
     *
     * @return string
     */
    protected function _hash(callable $callback)
    {
        return (string)new Reflection\Func($callback);
    }

    /**
     * @param callable $callback
     * @param string   $string
     *
     * @return string
     */
    protected function _unique(callable $callback, &$string)
    {
        if (!$string)
        {
            $string = $this->_hash($callback);
        }

        return $string;
    }

    /**
     * @param callable $callback
     * @param string   $unique
     *
     * @return object
     */
    protected function once(callable $callback, $unique = null)
    {
        $this->_unique($callback, $unique);

        if (empty($this->instances[$unique]))
        {
            $this->instances[$unique] = $callback();
        }

        return $this->instances[$unique];
    }

}
