<?php

namespace spec\StanfordAlgCourse\InversionsCount;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MainSpec extends ObjectBehavior
{
    function it_passes_simple_tests()
    {
        $this->countInv([1,5,3,4])->shouldReturn(2);
        $this->countInv([2,1])->shouldReturn(1);
        $this->countInv([1,3,5,2,4,9,7])->shouldReturn(4);
        $this->countInv([1,7,6,4,18,5,3,2])->shouldReturn(17);
        $this->countInv([18, 22, 4, 29, 15, 21, 13, 24, 20,
            10, 11, 26, 27, 16, 12, 8, 25, 14, 6, 17, 30, 9,
            28, 5, 2, 1, 23, 7, 19, 3])->shouldReturn(266);
        $this->countInv([37, 7, 2, 14, 35, 47, 10, 24, 44,
            17, 34, 11, 16, 48, 1, 39, 6, 33, 43, 26, 40, 4,
            28, 5, 38, 41, 42, 12, 13, 21, 29, 18, 3, 19, 0,
            32, 46, 27, 31, 25, 15, 36, 20, 8, 9, 49, 22, 23,
            30, 45])->shouldReturn(590);
    }

    function it_passes_spec_from_stanford_file()
    {
        $test = [];
        foreach(file('spec/StanfordAlgCourse/InversionsCount/integer_array.txt') as $num) {
            $test[] = intval($num);
        }
        $this->countInv($test)->shouldReturn(2407905288);
    }
}
