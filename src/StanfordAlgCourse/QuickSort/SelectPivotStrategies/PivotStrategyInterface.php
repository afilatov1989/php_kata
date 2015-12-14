<?php

namespace StanfordAlgCourse\QuickSort\SelectPivotStrategies;


interface PivotStrategyInterface {

    /**
     * Should count by any logic and return index of array
     * to use it as a pivot in QuickSort algorithm.
     * Can return, for example, first, last, median or random element
     * @param array $A
     * @param int $from
     * @param bool $to
     * @return integer
     */
    public function getPivot(array $A, $from = 0, $to = false);
}