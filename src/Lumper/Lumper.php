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
        return new Reflection\Func($callback);
    }

    /**
     * @param callable $callback
     * @param string   $hash
     *
     * @return string
     */
    protected function _unique(callable $callback, $hash)
    {
        if (null === $hash)
        {
            $hash = $this->_hash($callback);
        }

        return $hash;
    }

    /**
     * @param callable $callback
     * @param string   $unique
     *
     * @return object
     */
    public function once(callable $callback, $unique = null)
    {
        $_ = (string)$this->_unique($callback, $unique);

        if (empty($this->instances[$_]))
        {
            $this->instances[$_] = $callback($unique);
        }

        return $this->instances[$_];
    }

}
