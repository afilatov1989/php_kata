<?php

namespace StanfordAlgCourse\QuickSort\SelectPivotStrategies;


class PivotStrategyFirst implements PivotStrategyInterface {

    public function getPivot(array $A, $from = 0, $to = false)
    {
        return $from;
    }
}