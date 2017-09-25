<?php

namespace Tests;

use Bavix\Helpers\Str;
use Bavix\Lumper\Bind;
use Bavix\Tests\Unit;

class BindTest extends Unit
{

    public function testBind()
    {
        $callable = Bind::once(__FUNCTION__, function () {
            return Str::random();
        });

        $this->assertSame(
            Bind::once(__FUNCTION__, [$this, __FUNCTION__]),
            $callable
        );
    }

}
