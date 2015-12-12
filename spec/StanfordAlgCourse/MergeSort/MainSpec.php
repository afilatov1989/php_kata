<?php

namespace spec\StanfordAlgCourse\MergeSort;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MainSpec extends ObjectBehavior
{
    function it_sorts_arrays_correctly()
    {
        $this->mergeSort([1,5,3,4])->shouldReturn([1,3,4,5]);
        $this->mergeSort([2,1])->shouldReturn([1,2]);
        $this->mergeSort([1,3,5,2,4,9,7])->shouldReturn([1,2,3,4,5,7,9]);
        $this->mergeSort([1,7,6,4,18,5,3,2])->shouldReturn([1,2,3,4,5,6,7,18]);
        $this->mergeSort([18, 22, 4, 29, 15, 21,
            13, 24, 20, 10, 11, 26, 27, 16, 12,
            8, 25, 14, 6, 17, 30, 9, 28, 5, 2, 1, 23, 7, 19, 3])
            ->shouldReturn([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,
                18,19,20,21,22,23,24,25,26,27,28,29,30]);
        $this->mergeSort([37, 7, 2, 14, 35, 47, 10, 24, 44, 17, 34,
            11, 16, 48, 1, 39, 6, 33, 43, 26, 40, 4, 28, 5, 38, 41,
            42, 12, 13, 21, 29, 18, 3, 19, 0, 32, 46, 27, 31, 25, 15,
            36, 20, 8, 9, 49, 22, 23, 30, 45])
            ->shouldReturn([0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,
                17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,
                33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49]);
    }
}
