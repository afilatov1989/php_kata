<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SolutionSpec extends ObjectBehavior {

    function it_should_return_correct_values()
    {
        $this->main()->shouldReturn(null);
    }
}
