<?php

namespace spec\StanfordAlgCourse\QuickSort;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use StanfordAlgCourse\QuickSort\SelectPivotStrategies\PivotStrategyFirst;
use StanfordAlgCourse\QuickSort\SelectPivotStrategies\PivotStrategyLast;
use StanfordAlgCourse\QuickSort\SelectPivotStrategies\PivotStrategyMedian;

class MainSpec extends ObjectBehavior
{
    private function getTestArray() {
        $test = [];
        foreach(file('spec/StanfordAlgCourse/QuickSort/QuickSort.txt') as $num) {
            $test[] = intval($num);
        }
        return $test;
    }

    function it_sorts_correctly_with_first_strategy() {
        $this->beConstructedWith(new PivotStrategyFirst());
        $this->sorted([3,8,2,5,1,4,7,6])->shouldReturn([1,2,3,4,5,6,7,8]);
        $this->countComparisons($this->getTestArray())->shouldReturn(162085);
    }

    function it_sorts_correctly_with_second_strategy() {
        $this->beConstructedWith(new PivotStrategyLast());
        $this->sorted([3,8,2,5,1,4,7,6])->shouldReturn([1,2,3,4,5,6,7,8]);
        $this->countComparisons($this->getTestArray())->shouldReturn(164123);
    }

    function it_sorts_correctly_with_third_strategy() {
        $this->beConstructedWith(new PivotStrategyMedian());
        $this->sorted([3,8,2,5,1,4,7,6])->shouldReturn([1,2,3,4,5,6,7,8]);
        $this->countComparisons($this->getTestArray())->shouldReturn(138382);
    }
}
