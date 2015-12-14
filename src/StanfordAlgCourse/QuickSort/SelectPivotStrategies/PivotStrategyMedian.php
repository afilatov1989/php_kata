<?php

namespace StanfordAlgCourse\QuickSort\SelectPivotStrategies;


class PivotStrategyMedian implements PivotStrategyInterface {

    public function getPivot(array $A, $from = 0, $to = false)
    {
        if($to === false) $to = count($A) - 1;
        $middle = intval(($to + $from) / 2);
        $values = [$A[$middle], $A[$to], $A[$from]];
        sort($values);
        if($A[$from] == $values[1]) return $from;
        if($A[$middle] == $values[1]) return $middle;
        if($A[$to] == $values[1]) return $to;
    }
}

