<?php

namespace StanfordAlgCourse\QuickSort\SelectPivotStrategies;


interface PivotStrategyInterface {
    public function getPivot(array $A, $from = 0, $to = false);
}