<?php

namespace Tests;

use Bavix\Lumper\Lumper;
use Bavix\Slice\Slice;
use Bavix\Tests\Unit;

class LumperTest extends Unit
{

    /**
     * @var Lumper
     */
    protected $lumper;

    public function setUp()
    {
        parent::setUp();

        $this->lumper = new Lumper();
    }

    public function testLumper()
    {
        $uniqid = $this->lumper->once('uniqid');

        $this->assertSame($uniqid, $this->lumper->once('uniqid'));
    }

    public function testSlice()
    {
        $slice = new Slice(['min' => 1, 'max' => 2]);
        $callable = function (Slice $slice)
        {
              return $slice->getData('min') + $slice->getData('max');
        };

        $result = $this->lumper->once($callable, $slice);

        $slice->min = 2;
        $slice->max = 10;

        $this->assertNotSame($result, $this->lumper->once($callable, $slice));
    }

}
