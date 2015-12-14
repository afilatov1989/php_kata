<?php

namespace StanfordAlgCourse\QuickSort;

use StanfordAlgCourse\QuickSort\SelectPivotStrategies\PivotStrategyInterface;

class Main {

    /**
     * @var PivotStrategyInterface
     */
    private $pivotStrategy;

    private $countComparisons;

    /**
     * Main constructor. Pivot finding strategy injected
     * @param PivotStrategyInterface $pivotStrategy
     */
    public function __construct(PivotStrategyInterface $pivotStrategy)
    {
        $this->pivotStrategy = $pivotStrategy;
    }

    /**
     * _sort public wrapper. Returns sorted array
     * @param array $A
     * @return array
     */
    public function sorted(array $A)
    {
        $this->countComparisons = 0;
        $this->_sort($A, 0, count($A) - 1);

        return $A;
    }

    /**
     * _sort public wrapper. Counts comparisons for current pivot finding strategy
     * @param array $A
     * @return int
     */
    public function countComparisons(array $A)
    {
        $this->countComparisons = 0;
        $this->_sort($A, 0, count($A) - 1);

        return $this->countComparisons;
    }

    /**
     * Main recursive method of algorithm
     * @param array $A
     * @param integer $from
     * @param integer $to
     * @return null
     */
    private function _sort(array &$A, $from, $to)
    {
        $this->countComparisons += $to - $from;

        // Base case
        if ($from == $to) return;

        // Select pivot
        $pivot_index = $this->pivotStrategy->getPivot($A, $from, $to);

        // Divide array and count sub problems
        $partition_index = $this->arrayPartition($A, $from, $to, $pivot_index);
        if ($from < $partition_index) $this->_sort($A, $from, $partition_index - 1);
        if ($to > $partition_index) $this->_sort($A, $partition_index + 1, $to);
    }

    /**
     * Partition method (see QuickSort algorithm description)
     * @param $A
     * @param $from
     * @param $to
     * @param $pivot_index
     * @return mixed
     */
    private function arrayPartition(&$A, $from, $to, $pivot_index)
    {
        if ($pivot_index != $from) $this->array_swap($A, $pivot_index, $from);
        $i = $from + 1;
        $j = $from + 1;
        while ($j <= $to)
        {
            if ($A[$j] < $A[$from])
            {
                $this->array_swap($A, $j, $i);
                $i ++;
            }
            $j ++;
        }
        $this->array_swap($A, $from, $i - 1);

        return $i - 1;
    }

    /**
     * swaps 2 elements with given indices in array
     * @param $array
     * @param $swap_a
     * @param $swap_b
     * @return null
     */
    private function array_swap(&$array, $swap_a, $swap_b)
    {
        list($array[$swap_a], $array[$swap_b]) = array($array[$swap_b], $array[$swap_a]);
    }

}
