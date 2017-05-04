<?php

namespace Bavix\Lumper;

use Bavix\Slice\Slice;

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
    protected function _string(callable $callback)
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
        if (null === $hash || $hash instanceof Slice)
        {
            $hash .= $this->_string($callback);
        }

        return $hash;
    }

    /**
     * @param callable $callback
     * @param string   $unique
     *
     * @return mixed
     */
    public function once(callable $callback, $unique = null)
    {
        $_ = (string)$this->_unique($callback, $unique);

        if (empty($this->instances[$_]))
        {
            $this->instances[$_] =
                $unique instanceof Slice ?
                    $callback($unique) :
                    $callback();
        }

        return $this->instances[$_];
    }

}
