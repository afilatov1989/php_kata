<?php

namespace StanfordAlgCourse\QuickSort\SelectPivotStrategies;


class PivotStrategyLast implements PivotStrategyInterface {

    public function getPivot(array $A, $from = 0, $to = false)
    {
        if($to === false) $to = count($A) - 1;
        return $to;
    }
}